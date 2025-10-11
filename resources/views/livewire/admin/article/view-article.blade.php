<div class="relative bg-white rounded-xl mb-10 pt-2 min-h-[100vh]">
    <div class="flex justify-end py-2 px-4">
        <a x-data="{isHovered: false}" href="/admin/articles/{{ $article->slug }}/edit" 
            x-on:mouseenter="isHovered=true" 
            x-on:mouseleave="isHovered=false"
            x-transiton
            class="text-blue-500 font-semibold tracking-wide inline-flex items-center gap-2 text-sm hover:underline">
            <span>Edit article</span>
            <svg class="size-5 -rotate-90 transition duration-300 ease-in-out" x-bind:class="isHovered && 'translate-x-1' " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                stroke-width="2">
                <path d="M6 9l6 6l6 -6"></path>
            </svg>
        </a>
    </div>
    <div class="py-10 px-4 divide-y divide-gray-200">
        <div class="flex flex-wrap items-center gap-3 pb-3">
            <span class="text-md frank-bold">Article title</span>
            <span class="text-sm tracking-wide">{{ $article->title }}</span>
        </div>
        <div class="flex flex-wrap items-center gap-3 py-3">
            <span class="text-md frank-bold">Article Topic</span>
            <span class="text-sm tracking-wide">{{ $article->topicModel()->title ?? $article->topic }}</span>
        </div>
        <div class="flex flex-wrap items-center gap-3 py-3">
            <span class="text-md frank-bold">Published at</span>
            <span class="text-sm tracking-wide">{{ date('M d, y', strtotime($article->published_at)) }}</span>
        </div>
        <div class="flex flex-wrap gap-3 py-3">
            <span class="text-md frank-bold">Article Main Photo</span>
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}'s photo"
                class="rounded w-full md:w-[70%] h-auto">
        </div>
        @if (count($article->contentBlocks) > 0)
            <div class="pt-5">
                <h4 class="text-xl">Content blocks</h4>
                <div class="px- 4 mt-4 divide-y divide-gray-200">
                    @foreach ($article->contentBlocks as $block)
                        @if ($block->type == 'sub-topic')
                            <div class="flex flex-col gap-3 py-3">
                                <span
                                    class="text-md frank-bold uppercase">{{ $block->position . '. ' . $block->type }}</span>
                                <h4 class="text-md w-full max-w-3xl">{{ $block->content }}</h4>
                            </div>
                        @elseif($block->type == 'paragraph')
                            <div class="flex flex-col gap-3 py-3">
                                <span
                                    class="text-md frank-bold uppercase">{{ $block->position . '. ' . $block->type }}</span>
                                <p class="text-sm w-full max-w-3xl">{{ $block->content }}</p>
                            </div>
                        @elseif($block->type == 'image')
                            <div class="flex flex-col gap-3 py-3">
                                <span
                                    class="text-md frank-bold uppercase">{{ $block->position . '. ' . $block->type }}</span>
                                <img src="{{ asset('storage/' . $block->content) }}"
                                    alt="{{ $article->title }}'s photo" class="rounded w-full md:w-[70%] h-auto">
                            </div>
                        @elseif($block->type == 'ordered-list')
                            <div class="flex flex-col gap-3 py-3">
                                <span
                                    class="text-md frank-bold uppercase">{{ $block->position . '. ' . $block->type }}</span>
                                <ol role="list" class="pl-4 list-decimal space-y-2 text-sm w-full max-w-[60%]">
                                    @foreach (json_decode($block->content) as $list_item)
                                        <li>{{ $list_item }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        @elseif($block->type == 'unordered-list')
                            <div class="flex flex-col gap-3 py-3">
                                <span
                                    class="text-md frank-bold uppercase">{{ $block->position . '. ' . $block->type }}</span>
                                <ul role="list" class="list-none space-y-2 text-sm w-full max-w-[60%]">
                                    @foreach (json_decode($block->content) as $list_item)
                                        <li>{{ $list_item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @elseif($block->type == 'table')
                            <div class="flex flex-col gap-3 py-3">
                                <span
                                    class="text-md frank-bold uppercase">{{ $block->position . '. ' . $block->type }}</span>
                                <div class="px-0 pt-0 pb-2">
                                    <div class="p-0 overflow-x-auto">
                                        <table
                                            class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                                            @php
                                                $table = json_decode($block->content);
                                            @endphp
                                            @if ($table->head->hasData)
                                                <thead class="align-bottom">
                                                    <tr>
                                                        @foreach ($table->head->data as $col)
                                                            <th
                                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-600 opacity-70">
                                                                {{ $col }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                            @endif
                                            <tbody>
                                                @foreach ($table->data as $row)
                                                    <tr>
                                                        @foreach ($row as $data)
                                                            <td
                                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                                <p class="mb-0 text-sm leading-tight text-slate-700">
                                                                    {{ $data }}
                                                                </p>
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
        <div class="flex py-3">
            <button wire:click="delete"
            wire:confirm="This action cannot be reversed. Are you sure you want to delete this article?"
             class="py-3 px-6 text-xs font-semibold uppercase text-primary-50 bg-rose-600 rounded-md transition hover:-translate-y-1 duration-300 ease-in-out">
                delete article
            </button>
        </div>
    </div>
</div>
