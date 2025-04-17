<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-600">
            Testimoni
        </h3>
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="flex items-center space-x-2 px-3 py-2.5 bg-white border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">
                <span>Urutkan</span>
                <i class="fas fa-chevron-down text-xs"></i>
            </button>
            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-1 w-48 bg-white border border-gray-300 rounded-md shadow-lg z-10">
                <div class="py-1">
                    <button wire:click="sortBy('created_at')"
                        class="w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                        <span>Tanggal</span>
                        @if ($sortField === 'created_at')
                            <i
                                class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} text-xs text-gray-500"></i>
                        @endif
                    </button>
                    <button wire:click="sortBy('name')"
                        class="w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                        <span>Nama</span>
                        @if ($sortField === 'name')
                            <i
                                class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} text-xs text-gray-500"></i>
                        @endif
                    </button>
                    <button wire:click="sortBy('city')"
                        class="w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                        <span>Kota</span>
                        @if ($sortField === 'city')
                            <i
                                class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} text-xs text-gray-500"></i>
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- headline --}}
    <div class="mb-5 flex justify-center">
        <div class="border border-gray-300 min-w-1/2 rounded-md relative">
            @if ($isShowHeadlineForm)
                <form wire:submit.prevent='handleSaveHeadline' class="p-4">
                    <div class="mb-2">
                        <input type="text" id="productHeadlineTitle" wire:model='headlineTitle'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-200 block w-full p-2.5"
                            placeholder="Judul">
                    </div>
                    <div class="mb-2">
                        <textarea id="productHeadlineSubtitle" rows="2" wire:model='headlineSubtitle'
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300  focus:outline-gray-400"
                            placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="mt-1 flex justify-end gap-1">
                        <button type="button" wire:click='handleCloseHeadlineForm'
                            class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                            Batal
                        </button>
                        <button type="submit"
                            class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                            Simpan
                        </button>
                    </div>
                </form>
            @else
                <div class="p-8 flex flex-col justify-center items-center text-center">
                    <h1 class="text-4xl font-bold font-display mb-1">
                        {{ $headline->title }}
                    </h1>
                    <div class="w-24 h-1.5 bg-primary-gold mt-5 mb-8 rounded-full"></div>
                    <p class="text-sm font-medium">
                        {{ $headline->subtitle }}
                    </p>
                    <button wire:click='handleOpenHeadlineForm' type="button"
                        class="absolute top-1 right-1 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 hover:text-white text-xs rounded-sm">
                        <i wire:loading.remove wire:target="handleOpenHeadlineForm"
                            class="fa fa-pencil text-[11px] pr-0.5 text-gray-600 group-hover:text-white"></i>
                        <span wire:loading wire:target="handleOpenHeadlineForm"
                            class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                        </span>
                        <span>
                            Edit
                        </span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-3 gap-3">
        {{-- content display --}}
        @foreach ($testimonials as $testimonial)
            <div class="w-full min-h-40 p-4 border border-gray-300 rounded-md relative">
                <div class="flex justify-between space-x-2">
                    <div class="flex space-x-2 mb-3">
                        <div class="w-10 h-10 flex justify-center items-center bg-primary-gold/10 rounded-full">
                            <span class="text-xl font-bold text-primary-gold">
                                {{ substr($testimonial->name, 0, 1) }}
                            </span>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold">
                                {{ $testimonial->name }}
                            </h4>
                            <p class="text-sm text-gray-500">
                                {{ $testimonial->city }}
                            </p>
                        </div>
                    </div>
                    <div wire:click='handleDelete({{ $testimonial->id }})'
                        wire:confirm='Apakah Anda yakin ingin menghapus testimoni ini?'
                        class="w-7 h-7 flex justify-center items-center border border-red-500 hover:bg-red-500 text-red-500 hover:text-white rounded-md">
                        <i wire:loading.remove wire:target="handleDelete({{ $testimonial->id }})"
                            class="fa fa-trash text-xs"></i>
                        <span wire:loading wire:target="handleDelete({{ $testimonial->id }})"
                            class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                        </span>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mb-2">
                    {{ $testimonial->created_at->format('F d, Y') }}
                </p>
                <p class="text-sm">
                    {{ $testimonial->testimonial }}f
                </p>
            </div>
        @endforeach
    </div>
</div>
