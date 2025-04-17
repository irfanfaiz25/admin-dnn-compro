<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Cabang
        </h3>
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
                            class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                            <span>
                                Simpan
                            </span>
                            <span wire:loading wire:target='handleSaveHeadline'
                                class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                            </span>
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

    @if (!$isShowContentForm)
        <div class="flex justify-end mb-4">
            <button type="button" wire:click='handleOpenContentForm'
                class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                Tambah
            </button>
        </div>
    @endif

    {{-- form --}}
    <div wire:show='isShowContentForm' wire:cloak wire:transition
        class="mb-5 w-full bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
        <form wire:submit.prevent='handleSaveContent'>
            <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300">
                <h3 class="text-lg font-semibold text-gray-600 capitalize">
                    Edit Konten
                </h3>
                <div class="flex space-x-2 justify-end">
                    <button type="button" wire:click='handleCloseContentForm'
                        class="text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Batal
                        </span>
                        <span wire:loading wire:target='handleCloseContentForm'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                    @if ($isEditMode)
                        <button type="button" wire:click='handleDeleteBranch'
                            wire:confirm='Apakah anda yakin akan menghapus data cabang ini?'
                            class="text-red-600 bg-red-100 hover:bg-red-200 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                            <span>
                                Hapus
                            </span>
                            <span wire:loading wire:target='handleCloseContentForm'
                                class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                            </span>
                        </button>
                    @endif
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Simpan
                        </span>
                        <span wire:loading wire:target='handleSaveContent'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="mb-4 flex justify-between gap-3">
                    <div class="w-1/3">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900">
                            Lokasi Cabang <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="location" wire:model='city'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Boyolali">
                        @error('city')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-2/3">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">
                            Alamat Cabang <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="address" wire:model='address'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Jl. Singoprono raya, no.10">
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 flex justify-between gap-3">
                    <div class="w-1/2">
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-900">
                            Provinsi Cabang <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="province" wire:model='region'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Jawa Tengah">
                        @error('region')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="established" class="block mb-2 text-sm font-medium text-gray-900">
                            Tahun Berdiri <span class="text-red-500">*</span>
                        </label>
                        <input type="month" id="established" wire:model='established'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5">
                        @error('established')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Display --}}
    <div class="mx-auto h-fit bg-white">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
            @foreach ($branches as $branch)
                <div
                    class="bg-white p-4 md:p-6 rounded-2xl shadow-lg hover:shadow-2xl group relative overflow-hidden border border-gray-100 transition-transform duration-300">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-primary-gold/5 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-32 h-32 bg-tertiary-red/5 rounded-full translate-y-16 -translate-x-16 group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <button type="button" wire:click='handleEditBranch({{ $branch->id }})'
                        class="absolute top-3 right-3 px-3 py-1.5 border border-gray-600 hover:bg-gray-600 text-gray-600 hover:text-white text-xs rounded-sm z-50 inline-flex items-center">
                        <i wire:loading.remove wire:target="handleEditBranch({{ $branch->id }})"
                            class="fa fa-pencil text-[11px] pr-1"></i>
                        <span wire:loading wire:target="handleEditBranch({{ $branch->id }})"
                            class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                        </span>
                        <span>
                            Edit
                        </span>
                    </button>

                    <div class="relative">
                        <div class="flex items-center mb-3">
                            <i class="fa fa-location-dot text-primary-gold mr-2 flex-shrink-0"></i>
                            <h3
                                class="text-xl md:text-2xl font-display font-bold text-gray-800 group-hover:text-primary-gold transition-colors">
                                {{ $branch->city }}
                            </h3>
                        </div>
                        <p class="text-gray-600 text-sm font-medium mb-2 line-clamp-2">
                            {{ $branch->address }}
                        </p>

                        <div class="space-y-3 mt-3">
                            <div class="flex items-center text-base text-gray-500">
                                <span>{{ $branch->region }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2 text-primary-gold flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Established
                                    {{ \Carbon\Carbon::parse($branch->established)->format('F Y') }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
