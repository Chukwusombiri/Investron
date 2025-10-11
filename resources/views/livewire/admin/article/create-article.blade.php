<div class="relative bg-white rounded-xl mb-10 pt-2">
    <x-admin-alert />
    <div class="py-10 px-4">
        <h4 class="text-xl text-slate-700 uppercase text-center">Create New Article</h4>
        <form action="post" wire:submit.preventDefault="create">
            <div class="flex items-center gap-4 mt-4">
                <x-label for='title' class="w-full md:w-[200px] text-md">Article Title</x-label>
                <div class="w-full md:w-[70%] flex items-center flex-col gap-1">
                    <x-input type='text' id="title" wire:model='title' placeholder="article's title"
                        class="w-full" />
                    <x-input-error for="title" />
                </div>
            </div>
            {{-- topic section --}}
            <div x-data="{
                selected: 'Existing topics',
                isOpen: false,
                options: ['Existing topics', 'Create new topic']
            }" class="relative mt-4 flex gap-4 flex-wrap">
                <div class="relative w-full md:max-w-[200px]">
                    <x-label for="" class="text-md">Topic options</x-label>
                    <button type="button"
                        class="w-full rounded-xl bg-slate-50 border border-gray-200 text-slate-700 py-2 inline-flex items-center justify-between px-2"
                        x-on:click="isOpen = !isOpen">
                        <span x-text="selected"></span>
                        <svg class="size-5" :class="isOpen && 'rotate-180'" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" width="24" height="24" stroke-width="2">
                            <path d="M6 9l6 6l6 -6"></path>
                        </svg>
                    </button>

                    <div x-show="isOpen" x-transition class="absolute inset-0 w-full top-full z-40 mt-1"
                        x-on:click.away="isOpen = false">
                        <ul class="list-none divide-y divide-gray-200 bg-white shadow rounded">
                            <template x-for="option in options" :key="option">
                                <li x-text="option" class="py-1.5 px-2 cursor-pointer hover:bg-gray-300"
                                    x-on:click="selected = option; isOpen = false ; $wire.topic_id = null; $wire.topic = null;">
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-[70%]">
                    <template x-if="selected==='Create new topic' ">
                        <div class="w-full">
                            <x-label for="topic" class="block w-full text-md">Topic title</x-label>
                            <x-input type="text" class="w-full" wire:model.live="topic"
                                placeholder="Enter new topic title" />
                            <x-input-error for="topic" />
                        </div>
                    </template>
                    <template x-if="selected==='Existing topics' ">
                        <div class="w-full">
                            <x-label for="topic_id" class="block w-full text-md">Select topic</x-label>
                            <x-select class="w-full mt-2" wire:model.live="topic_id">
                                <option value="">Choose a topic</option>
                                @foreach ($allTopics as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error for="topic_id" />
                        </div>
                    </template>
                </div>
            </div>

            <div class="flex items-center gap-4 mt-4">
                <x-label for='publishedAt' class="w-full md:w-[200px] text-md">Article Published At</x-label>
                <div class="w-full md:w-[70%] flex items-center flex-col gap-1">
                    <x-input type='date' id="publishedAt" wire:model='published_at' required class="w-full" />
                    <x-input-error for="published_at" />
                </div>
            </div>

            <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
                class="flex items-center gap-2.5 flex-wrap mt-4">
                <div class="w-full">
                    <p class="text-md font-semibold">Upload main photo</p>
                </div>
                <input class="hidden" type="file" wire:model="image"
                    id="mainImage">
                <label for="mainImage"
                    class="rounded-xl text-primary-50 bg-slate-800 px-5 py-2.5 transition hover:-translate-y-1">choose
                    photo</label>
                @if ($image)
                    <div class="flex flex-col items-center w-40">
                        <img src="{{ $image->temporaryUrl() }}" alt="selected photo"
                            class="w-full h-40 rounded-lg">

                        <button type="button"
                         wire:click="removeImage"
                            class="mt-2 rounded-full inline-flex gap-2 bg-rose-100 text-rose-800 p-2">
                            <span class="hidden md:inline uppercase">remove</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                                height="24" stroke-width="2">
                                <path d="M18 6l-12 12"></path>
                                <path d="M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @else
                    <span></span>
                @endif

                <!-- Progress Bar -->
                <div x-show="uploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
            </div>
            <div class="border-t border-gray-200 mt-4 pt-4">
                <h3 class="text-xl mb-3">Content blocks</h3>
                <p class="text-md">Start adding contents in order of display</p>

                @foreach ($content_blocks as $i => $block)
                    <div class="w-full py-6 border-b first:border-y border-gray-200">
                        <div class="flex justify-end pb-2">
                            <button type="button" wire:click="removeContent({{ $i }})"
                                class="border border-primary-500 text-primary-500 rounded-full inline-flex justify-center items-center p-1.5 uppercase">
                                <span class="hidden mr-2 md:inline text-xs">remove</span>
                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                    <path d="M18 6l-12 12"></path>
                                    <path d="M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        @if ($block['type'] == 'sub-topic')
                            <div class="flex gap-4 mt-4">
                                <x-label for='content_blocks[{{ $i }}].content'
                                    class="w-full md:w-[200px] text-md">Sub-topic</x-label>
                                <div class="w-full md:w-[70%] flex items-center flex-col gap-1">
                                    <x-input type='text' id="content_blocks.{{ $i }}.content"
                                        wire:model='content_blocks.{{ $i }}.content'
                                        placeholder="Subtopic..." class="w-full" />
                                    <x-input-error for="content_blocks.{{ $i }}.content" />
                                </div>
                            </div>
                        @elseif($block['type'] == 'paragraph')
                            <div class="mt-4">
                                <x-label for='content_blocks[{{ $i }}].content'
                                    class="w-full text-md">Paragraph</x-label>
                                <div class="w-full flex items-center flex-col gap-1">
                                    <textarea type='text' id="content_blocks.{{ $i }}.content" rows="8"
                                        wire:model='content_blocks.{{ $i }}.content' placeholder="Paragraph..."
                                        class="w-full rounded-md border border-gray-200 focus:border-indigo-400"></textarea>
                                    <x-input-error for="content_blocks.{{ $i }}.content" />
                                </div>
                            </div>
                        @elseif($block['type'] == 'image')
                            <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false"
                                x-on:livewire-upload-cancel="uploading = false"
                                x-on:livewire-upload-error="uploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                                class="flex items-center gap-2.5 flex-wrap">
                                <div class="w-full">
                                    <p class="text-md frank-bold">Upload image</p>
                                </div>
                                <input class="hidden" type="file"
                                    wire:model="content_blocks.{{ $i }}.content" id="image">
                                <label for="image"
                                    class="rounded-xl text-primary-50 bg-slate-800 px-5 py-2.5 transition hover:-translate-y-1">choose
                                    photo</label>
                                @if ($block['content'] !== '')
                                    <div class="flex flex-col items-center w-40">
                                        <img src="{{ $block['content']->temporaryUrl() }}" alt="selected photo"
                                            class="w-full h-40 rounded-lg">

                                        <button type="button" wire:click="removeImage({{ $i }})"
                                            class="mt-2 rounded-full inline-flex gap-2 bg-rose-100 text-rose-800 p-2 hover:animate-pulsate">
                                            <span class="hidden md:inline uppercase">remove</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-linecap="round" stroke-linejoin="round" width="24"
                                                height="24" stroke-width="2">
                                                <path d="M18 6l-12 12"></path>
                                                <path d="M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                @else
                                    <span></span>
                                @endif

                                <!-- Progress Bar -->
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                        @elseif($block['type'] == 'ordered-list')
                            <div x-data="{
                                itemsCount: 1,
                                items: $wire.entangle('content_blocks.{{ $i }}.content'),
                                pushItems() {
                                    this.items = Array.from({ length: this.itemsCount }, () => '');
                                }
                            }" x-init="items = [...Array(itemsCount).fill('')];">
                                <p class="text-md frank-bold mb-2">Ordered List</p>
                                <div class="flex flex-wrap items-center gap-3">
                                    <span class="text-xs frank-bold tracking-wide">Number of items</span>
                                    <x-input type="number" x-model="itemsCount" min="1" step="1"
                                        class="" />
                                    <button type="button" x-on:click="pushItems"
                                        class="text-xs frank-bold uppercase bg-blue-100 rounded-md border border-blue-800 text-blue-800 px-4 py-1.5">set
                                    </button>
                                </div>
                                <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <template x-for="(item, index) in items" :key="index">
                                        <x-input type="text" class="w-full" x-model="items[index]"
                                            placeholder="Type here" />
                                    </template>
                                    <div class="flex justify-end">
                                        <button type="button"
                                            x-on:click="items = [...items, '']; itemsCount=Number(itemsCount) + 1;"
                                            class="border-0 outline-none text-blue-500 underline capitalize text-sm frank-bold tracking-wide">
                                            Add one more
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @elseif($block['type'] == 'unordered-list')
                            <div x-data="{
                                itemsCount: 1,
                                items: $wire.entangle('content_blocks.{{ $i }}.content'),
                                pushItems() {
                                    this.items = Array.from({ length: this.itemsCount }, () => '');
                                }
                            }" x-init="items = [...Array(itemsCount).fill('')];">
                                <p class="text-md frank-bold mb-2">Un-ordered List</p>
                                <div class="flex flex-wrap items-center gap-3">
                                    <span class="text-xs frank-bold tracking-wide">Number of items</span>
                                    <x-input type="number" x-model="itemsCount" min="1" step="1"
                                        class="" />
                                    <button type="button" x-on:click="pushItems"
                                        class="text-xs frank-bold uppercase bg-blue-100 rounded-md border border-blue-500 text-blue-800 px-4 py-1.5">set
                                    </button>
                                </div>
                                <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <template x-for="(item, index) in items" :key="index">
                                        <x-input type="text" class="w-full" x-model="items[index]"
                                            placeholder="Type here" />
                                    </template>
                                    <div class="flex justify-end">
                                        <button type="button" x-on:click="items = [...items, '']"
                                            class="border-0 outline-none text-blue-500 underline capitalize text-sm frank-bold tracking-wide">
                                            Add one more
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @elseif($block['type'] == 'table')
                            <div x-data="{
                                table: $wire.entangle('content_blocks.{{ $i }}.content'),
                                setStructure(){
                                }
                            }" x-init="table = {
                                columns: 0,
                                rows: 0,
                                bgColor: 'inherit',
                                textColor: 'inherit',
                                head: {
                                    hasData: false,
                                    bgColor: 'inherit',
                                    textColor: 'inherit',
                                    data: []
                                },
                                data: [],                                
                            }; setStructure = function(){                            
                                    // Update head data structure
                                    table.head.data = table.head.hasData ? Array.from({ length: table.columns }, () => '') : [];
                            
                                    // Update table rows and columns
                                    table.data = Array.from({ length: table.rows }, () => Array.from({ length: table.columns }, () => ''));                                
                            }">
                                <p class="text-md font-semibold">Table structure</p>

                                <!-- Number of Columns -->
                                <div class="flex flex-wrap items-center gap-3 mb-1.5">
                                    <span class="text-xs frank-bold tracking-wide">Number of Columns</span>
                                    <x-input type="number" x-model="table.columns" min="1" step="1"
                                        class="" />
                                </div>

                                <!-- Number of Rows -->
                                <div class="flex flex-wrap items-center gap-3 mb-1.5">
                                    <span class="text-xs frank-bold tracking-wide">Number of Rows</span>
                                    <x-input type="number" x-model="table.rows" min="1" step="1"
                                        class="" />
                                </div>

                                <!-- Table Background Color -->
                                <div class="flex flex-wrap items-center gap-3 mb-1.5">
                                    <span class="text-xs frank-bold tracking-wide">Table background color</span>
                                    <x-input type="text" x-model="table.bgColor" class="" />
                                </div>

                                <!-- Table Color -->
                                <div class="flex flex-wrap items-center gap-3 mb-2">
                                    <span class="text-xs frank-bold tracking-wide">Table text color</span>
                                    <x-input type="text" x-model="table.textColor" class="" />
                                </div>

                                <!-- Table Head Toggle -->
                                <div class="flex flex-wrap items-center gap-3 mb-1.5">
                                    <label for="hasTableHead" class="text-xs frank-bold tracking-wide">Does table have
                                        head</label>
                                    <input type="checkbox" x-model="table.head.hasData" class="size-7 rounded"
                                        id="hasTableHead" />
                                </div>

                                <!-- Table Head Background Color -->
                                <div x-show="table.head.hasData" class="flex flex-wrap items-center gap-3 mb-1.5">
                                    <span class="text-xs frank-bold tracking-wide">Table head background color</span>
                                    <x-input type="text" x-model="table.head.bgColor" class="" />
                                </div>

                                <!-- Table Head Color -->
                                <div x-show="table.head.hasData" class="flex flex-wrap items-center gap-3 mb-2.5">
                                    <span class="text-xs frank-bold tracking-wide">Table head text color</span>
                                    <x-input type="text" x-model="table.head.textColor" class="" />
                                </div>

                                <!-- Set Structure Button -->
                                <button type="button" x-on:click="setStructure"
                                    class="bg-blue-100 rounded-md border border-blue-800 text-blue-800 px-4 text-xs font-semibold tracking-wide py-2">
                                    SET
                                </button>

                                <template x-if="table.head.hasData && table.head.data.length > 0">
                                    <div class="mt-3">
                                        <p class="text-sm frank-bold tracking-wide mb-1.5">Table head</p>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            <template x-for="(col, idx) in table.head.data" :key="idx">
                                                <div>
                                                    <label for="" class="mb-1 text-xs"
                                                        x-text=" 'Column '+(idx + 1) "></label>
                                                    <x-input type="text" x-model="table.head.data[idx]"
                                                        class="w-full" placeholder="Enter column name" />
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </template>
                                <template x-if="table.data.length > 0">
                                    <div class="mt-4">
                                        <p class="text-sm frank-bold tracking-wide mb-2">Table rows</p>
                                        <template x-for="(row, idx) in table.data" :key="idx">
                                            <div class="mb-4">
                                                <p class="text-xs frank-bold tracking-wide mb-1"
                                                    x-text="'Row ' + (idx + 1)"></p>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    <template x-for="(field, index) in row" :key="index">
                                                        <div>
                                                            <label for="" class="mb-1 text-xs"
                                                                x-text=" 'Row '+(idx + 1)+' column '+(index + 1) "></label>
                                                            <x-input type="text" x-model="table.data[idx][index]"
                                                                class="w-full" placeholder="Type here..." />
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </template>
                                        <button type="button"
                                            x-on:click="
                                                table.rows = Number(table.rows) + 1;
                                                table.data.push(Array.from({ length: table.columns }, () => ''));
                                            "
                                            class="text-blue-500 underline text-sm font-semibold tracking-wide">Add one
                                            row</button>
                                    </div>
                                </template>
                            </div>
                        @endif
                        <x-input-error for="content_blocks.{{ $i }}" />
                        <x-input-error for="content_blocks.{{ $i }}.type" />
                        <x-input-error for="content_blocks.{{ $i }}.content" />
                    </div>
                @endforeach


                <div x-data="{ isOpen: false, contentTypes: ['sub-topic', 'paragraph', 'image', 'ordered-list', 'unordered-list', 'table'] }" class="relative pt-4">
                    <button type="button"
                        class="rounded-xl bg-blue-100 border border-gray-200 text-blue-800 py-2 inline-flex items-center justify-between px-3"
                        x-on:click="isOpen = !isOpen">
                        <span class="mr-2">Add content</span>
                        <svg class="size-5" :class="isOpen && 'rotate-180'" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" width="24" height="24" stroke-width="2">
                            <path d="M6 9l6 6l6 -6"></path>
                        </svg>
                    </button>
                    <div x-show="isOpen" @click.outside="isOpen=false"
                        class="absolute w-full max-w-[200px] z-30 mt-2 top-full rounded-md overflow-hidden max-h-[400px] bg-white shadow divide-y divide-gray-200">
                        <template x-for="contentType in contentTypes" :key="contentType">
                            <button type="button" x-on:click="isOpen=false; $wire.pushContent(contentType)"
                                class="w-full hover:bg-gray-100 text-primary-500 text-sm uppercase px-2 py-2 flex justify-start"
                                x-text="contentType"></button>
                        </template>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-end gap-2.5 pt-3 mt-4 border-t border-gray-300">
                <x-action-message on="created successfully">Article created</x-action-message>
                <button type="submit"
                    class="rounded-xl bg-blue-500 text-primary-50 px-5 py-2.5 transition hover:-translate-y-1">create</button>
            </div>
        </form>
    </div>
</div>
