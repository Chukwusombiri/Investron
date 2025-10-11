<div class="relative bg-white rounded-xl mb-10">
    <div class="p-6 flex justify-between items-center flex-wrap">
        <h4 class="text-lg font-semibold">Articles</h4>
        <a href="/admin/articles/create"
            class="futura-book rounded-full border border border-neutral-900 px-4 py-2 bg-neutral-900 text-gray-100 hover:text-gray-100">
            create
        </a>
    </div>
    <x-admin-alert />
    {{-- search --}}
    <div class="my-10 w-full px-4 flex items-center">
        <div class="w-full relative border h-12 shadow p-4 rounded-full flex items-center">
            <input type="text" wire:model.live="search"
                class="w-full appearance-none border-none outline-none focus:outline-none focus:border-none focus:ring-transparent"
                placeholder="Search by title or topic">
            <button wire:click="clear" type="button">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-square-rounded-x-filled text-gray-500 hover:text-gray-600 h-7 w-7 fill-current"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z"
                        fill="currentColor" stroke-width="0" />
                </svg>
            </button>
        </div>
    </div>
    {{-- table --}}
    <div class="flex-auto px-4 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <div class="items-center w-full mb-0 align-top text-slate-500">
                <div>
                    @if (count($articles) > 0)
                        @foreach ($articles as $article)
                            <div class="p-2 border-b border-gray-300" key='{{ $article->id }}'>
                                <div class="flex items-center">
                                    <div
                                        class="w-24 h-24 flex items-center justify-center rounded overflow-hidden mr-3">
                                        <img src="{{ asset('storage/'.$article->image) ?? '' }}"
                                            alt="{{ $article->title . '\'s photo' }}" class="w-full h-full">
                                    </div>
                                    <div class="align-middle bg-transparent whitespace-nowrap text-wrap mr-auto">
                                        <p class="frank-bold mb-0 text-sm text-slate-700 text-wrap">
                                            {{ $article->title }}
                                        </p>                         
                                        <p class="text-gray-500 azo-sans text-xs">Category:
                                            {{ $article->topicModel()->title ?? $article->topic }}</p>               
                                        <p class="text-gray-500 azo-sans text-xs">Published:
                                            {{ date('M d, y', strtotime($article->published_at)) }}</p>
                                        <a href="/admin/articles/{{$article->slug}}" class="text-blue-500 frank-bold text-xs inline-flex gap-1 items-center hover:underline">
                                            <span>Show more</span>
                                            <svg class="size-5 -rotate-90"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                width="24" height="24" stroke-width="2">
                                                <path d="M6 9l6 6l6 -6"></path>
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="text-center align-middle bg-transparent whitespace-nowrap">
                                        <a href="{{ route('admin.articles.edit', [$article->slug]) }}"
                                            class="rounded-xl text-xs font-semibold px-6 py-2 mr-3 uppercase bg-slate-800 text-primary-50 hover:text-primary-50 hover:bg-opacity-85 ring ring-transparent active:ring-2 active:ring-slate-800">edit</a>
                                        <button wire:click="delete({{ $article->id }})"
                                            wire:confirm="Are you sure you want to delete this article?"
                                            class="rounded-xl text-xs font-semibold px-6 py-2 uppercase bg-rose-600 text-primary-50 hover:bg-opacity-85 ring ring-transparent active:ring-2 active:ring-rose-600">delete</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @elseif($search !== '' && count($articles) < 1)
                        <p
                            class="text-sm md:text-lg text-gray-700 font-semibold py-1 flex gap-2 justify-start md:justify-center px-4">
                            You search doesn't match any record <svg class="size-6" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                <path d="M8 4h11a2 2 0 1 1 0 4h-7m-4 0h-3a2 2 0 0 1 -.826 -3.822"></path>
                                <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 1.824 -1.18m.176 -3.82v-7"></path>
                                <path d="M10 12h2"></path>
                                <path d="M3 3l18 18"></path>
                            </svg></p>
                    @else
                        <p
                            class="text-start md:text-center text-sm md:text-lg text-gray-700 font-semibold py-1 flex gap-2 justify-start md:justify-center px-4">
                            No records found <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                width="24" height="24" stroke-width="2">
                                <path
                                    d="M5.029 5.036c-.655 .58 -1.029 1.25 -1.029 1.964c0 2.033 3.033 3.712 6.96 3.967m3.788 -.21c3.064 -.559 5.252 -2.029 5.252 -3.757c0 -2.21 -3.582 -4 -8 -4c-1.605 0 -3.1 .236 -4.352 .643">
                                </path>
                                <path
                                    d="M4 7c0 .664 .088 1.324 .263 1.965l2.737 10.035c.5 1.5 2.239 2 5 2s4.5 -.5 5 -2c.1 -.3 .252 -.812 .457 -1.535m.862 -3.146c.262 -.975 .735 -2.76 1.418 -5.354a7.45 7.45 0 0 0 .263 -1.965">
                                </path>
                                <path d="M3 3l18 18"></path>
                            </svg> Create articles to get started. </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="p-4">
            {{ $articles->links() }}
        </div>
    </div>
</div>
