<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ShowArticles extends Component
{
    use WithPagination;

    public $search = '';

    public function clear(){
        $this->search = '';
        $this->resetPage();
    }

    public function delete($id){
        $article = Article::findOrFail($id);
        $article->delete();
        return;        
    }


    public function render()
    {
        return view('livewire.admin.article.show-articles',[
            'articles' => Article::where('title','like',"%$this->search%")
                            ->orWhere('topic','like',"%$this->search%")
                            ->orderByDesc('published_at')
                            ->paginate(8)
        ]);
    }
}
