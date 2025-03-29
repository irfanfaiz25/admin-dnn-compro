<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md">
    <div class="pb-4 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-600">
            Testimoni
        </h3>
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="flex items-center space-x-2 px-3 py-2.5 bg-white border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">
                <span>Sort By</span>
                <i class="fas fa-chevron-down text-xs"></i>
            </button>
            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-1 w-32 bg-white border border-gray-300 rounded-md shadow-lg z-10">
                <div class="py-1">
                    <button wire:click="sortBy('latest')"
                        class="w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                        Latest
                    </button>
                    <button wire:click="sortBy('oldest')"
                        class="w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                        Oldest
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-3">
        {{-- content display --}}
        @for ($i = 0; $i < 6; $i++)
            <div class="w-full min-h-40 p-4 border border-gray-300 rounded-md relative">
                <div class="flex justify-between space-x-2">
                    <div class="flex space-x-2 mb-3">
                        <div class="w-10 h-10 flex justify-center items-center bg-primary-gold/10 rounded-full">
                            <span class="text-xl font-bold text-primary-gold">
                                A
                            </span>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold">
                                Rudi Hartanto
                            </h4>
                            <p class="text-sm text-gray-500">
                                Surakarta
                            </p>
                        </div>
                    </div>
                    <div
                        class="w-7 h-7 flex justify-center items-center border border-red-500 hover:bg-red-500 text-red-500 hover:text-white rounded-md">
                        <i class="fa fa-trash text-xs"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mb-2">
                    November 10, 2024
                </p>
                <p class="text-sm">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque explicabo, maxime natus dignissimos
                    eum sunt, laudantium iure quasi qui facere exercitationem voluptatem labore, delectus architecto ex
                    molestiae excepturi odit voluptate?
                </p>
            </div>
        @endfor
    </div>
</div>
