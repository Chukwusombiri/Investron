<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use App\Models\ContentBlock;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditArticle extends Component
{
    use WithFileUploads;

    public $article;
    public $title = '';
    public $topic_id = null;
    public $new_topic = null;
    public $image = null;
    public $allTopics = [];
    public $published_at = '';
    public $content_blocks = [];

    public function mount(Article $sentArticle)
    {
        $this->article = $sentArticle;
        $this->title = $sentArticle->title;
        $this->topic_id = $sentArticle->topic_id;
        $this->published_at = $sentArticle->published_at;
        foreach ($sentArticle->contentBlocks as $key => $block) {
            $this->content_blocks[] = [
                'position' => $block->position,
                'type' => $block->type,
                'content' => ($block->type == 'table' || $block->type == 'unordered-list' || $block->type == 'ordered-list') ? json_decode($block->content) : $block->content
            ];
        }
    }

    public function pushContent($type)
    {
        $position = count($this->content_blocks) > 0 ? count($this->content_blocks) + 1 : 1;

        array_push($this->content_blocks, [
            'position' => $position,
            'type' => $type,
            'content' => $type == 'ordered-list' || $type == 'unordered-list' ? [''] : ''
        ]);
    }

    public function removeContent($idx)
    {
        unset($this->content_blocks[$idx]);
        $this->content_blocks = array_values($this->content_blocks);
    }

    public function removeImage($idx = null)
    {
        if (! $idx) {
            $this->image = null;
        } else {
            $this->content_blocks[$idx]["content"] = '';
            $this->render();
        }
    }

    public function update(Request $request)
    {
        $validated = $this->validate([
            'title' => ['required', 'string', Rule::unique('articles','title')->ignore($this->article->id)],
            'new_topic' => [Rule::excludeIf($this->topic_id !== null), 'required', 'string', 'unique:topics,title'],
            'topic_id' => [Rule::excludeIf($this->new_topic !== null), 'required', 'integer', 'exists:topics,id'],
            'image' => 'required|image:max:2000',
            'published_at' => 'required|date',
            'content_blocks' => 'required|array',
            'content_blocks.*' => 'required|array',
            'content_blocks.*.type' => 'required|in:sub-topic,paragraph,image,ordered-list,unordered-list,table',
            'content_blocks.*.content' => ['required', function ($attribute, $value, $fail) use ($request) {
                // Extract the index from the attribute (e.g., 'content_blocks.0.content')
                preg_match('/content_blocks\.(\d+)\.content/', $attribute, $matches);
                $index = $matches[1] ?? null;

                // Validate if the type is 'image'
                if ($index !== null && $request->input("content_blocks.$index.type") === 'image' && is_file($value)) {
                    if (!in_array($value->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                        $fail('The ' . $attribute . ' must be a valid image (jpeg, png, jpg).');
                    }

                    if ($value->getSize() > 1024 * 2000) { // 1 MB
                        $fail('The ' . $attribute . ' must not exceed 2MB.');
                    }
                }
            },],
            'content_blocks.*.position' => 'required|integer',
        ], [], [
            'new_topic' => 'New topic',
            'topic_id' => 'Existing topic',
            'content_blocks' => 'Article content',
            'content_block.*' => 'Content blocks',
            'content_blocks.*.type' => 'Content type',
            'content_blocks.*.content' => 'Article main content',
            'content_blocks.*.position' => 'Content position',
        ]);

        try {

            $topic = Topic::find($validated['topic_id'] ?? '');
            if (! $topic) {
                $topic = new Topic();
                $topic->title = $validated['new_topic'];
                $topic->save();
            }


            $article = Article::find($this->article->id);
            $article->title = $validated['title'];
            $article->topic = $topic->title;
            $article->topic_id = $topic->id;
            if ($this->image) {
                Storage::disk('public')->delete($article->image);
                $article->image = $validated['image']->storePublicly('insights', 'public');
            }
            $article->published_at = $validated['published_at'];
            $article->save();

            $oldcontents = $article->contentBlocks;

            foreach ($oldcontents as $value) {
                // Collect new image blocks from $this->content_blocks
                $collectionBlocks = collect($this->content_blocks)
                    ->filter(fn($blk) => $blk['type'] === 'image') // Only keep image blocks
                    ->map(function ($blk) {
                        // Return content only if it's not a file (skip actual file objects)
                        return is_file($blk['content']) ? null : $blk['content'];
                    })
                    ->filter() // Remove null values from the collection
                    ->toArray(); // Convert to array for easier in_array check

                // Check if the old content block should be deleted
                if (
                    $value->type === 'image' &&
                    empty($collectionBlocks) || // No valid image content in new blocks
                    !in_array($value->content, $collectionBlocks) // Old content not found in new blocks
                ) {
                    Storage::disk('public')->delete($value->content); // Delete the file
                }

                // Delete the old content block
                $value->delete();
            }


            foreach ($validated['content_blocks'] as $block) {
                $content = new ContentBlock();
                $content->article_id = $article->id;
                $content->position = $block['position'];
                $content->type = $block['type'];
                if ($block['type'] === 'image' && is_file($block['content'])) {
                    $content->content = $block['content']->storePublicly('insights/contentBlocks', 'public');
                } elseif ($block['type'] === 'table' || $block['type'] === 'ordered-list' || $block['type'] === 'unordered-list') {
                    $content->content = json_encode($block['content']);
                } else {
                    $content->content = $block['content'];
                }
                $content->save();
            }

            session()->flash('success', 'Article updated successfully!');
            $this->dispatch('updated');
        } catch (\Throwable $th) {
            throw $th;
            Log::error('Unable to edit article: ' . $th->getMessage());
            session()->flash('error', 'Unable to edit article! Contact site manager');
        }
    }

    public function render()
    {
        $this->allTopics = Topic::all();
        return view('livewire.admin.article.edit-article');
    }
}
