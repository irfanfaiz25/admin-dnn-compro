<div
    class="h-fit w-full p-4 bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            Hero Section
        </h3>
        @if (!$isShowForm)
            <button wire:click='handleOpenForm' type="button"
                class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                <span>Edit</span>
                <span wire:loading wire:target='handleOpenForm'
                    class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                </span>
            </button>
        @endif
    </div>

    {{-- form --}}
    <div wire:show='isShowForm' wire:cloak wire:transition
        class="mb-5 w-full bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
        <form wire:submit.prevent="handleSave">
            <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Edit Konten
                </h3>
                <div class="flex space-x-2 justify-end">
                    <button type="button" wire:click='handleCloseForm'
                        class="text-gray-600 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Batal
                        <span wire:loading wire:target='handleCloseForm'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Simpan
                        </span>
                        <span wire:loading wire:target='handleSave'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                </div>
            </div>
            <div class="p-4 space-y-6">
                <div
                    class="w-full space-y-4 bg-gray-50 dark:bg-[#252525] p-4 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-700 hover:border-secondary-green transition-colors duration-300">
                    <div class="relative group">
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" alt="preview image"
                                class="w-full h-[600px] object-cover rounded-md shadow-lg transition-transform duration-300 group-hover:scale-[1.02]">
                            <div
                                class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white text-sm font-medium">Preview Image</span>
                            </div>
                        @elseif ($existingImage)
                            <img src="{{ asset($existingImage) }}" alt="preview image"
                                class="w-full h-[600px] object-cover rounded-md shadow-lg transition-transform duration-300 group-hover:scale-[1.02]">
                            <div
                                class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white text-sm font-medium">Preview Image</span>
                            </div>
                        @else
                            <div
                                class="w-full h-[600px] rounded-lg shadow-md bg-gray-200 dark:bg-neutral-700 flex justify-center items-center">
                                <i wire:loading.remove wire:target='image'
                                    class="fa fa-image text-gray-400 dark:text-gray-500"></i>
                                <div wire:loading wire:target='image'
                                    class="space-y-2 flex flex-col justify-center items-center">
                                    <div
                                        class="mx-auto animate-spin rounded-full h-6 w-6 border-[2.5px] border-primary-gold border-t-transparent">
                                    </div>
                                    <p class="text-sm text-gray-500 font-semibold animate-pulse">
                                        Uploading ...
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                    @error('image')
                        <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                    @enderror
                    <div class="relative">
                        <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                            accept="image/*" wire:model="image">
                        <div
                            class="w-full px-4 py-3 text-sm font-medium text-center rounded-lg border-2 border-dashed border-secondary-green bg-white dark:bg-neutral-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-center gap-2">
                            <i class="fa fa-cloud-upload text-secondary-green"></i>
                            <span class="text-gray-700 dark:text-gray-300">Pilih Gambar Background</span>
                        </div>
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400 text-center">
                            PNG, JPG or JPEG (MAX. 2MB)
                            <span class="text-sm text-red-500">*</span>
                        </p>
                    </div>
                </div>
                <div class="w-full">
                    <div class="mb-4">
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Judul <span
                                class="text-sm text-red-500">*</span></label>
                        <input type="text" id="title" wire:model="heroTitle"
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Judul">
                        @error('heroTitle')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Deksripsi <span
                                class="text-sm text-red-500">*</span></label>
                        <textarea id="description" rows="3" wire:model="heroDescription"
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan deskripsi produk"></textarea>
                        @error('heroDescription')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Display --}}
    <div class="w-full h-[500px] relative">
        <img src="{{ asset($section->image_url) }}" alt="news-background"
            class="w-full h-full rounded-xl object-cover shadow-xl" />
        <div class="w-full h-full absolute top-0 bg-gradient-to-t from-black/90 to-transparent rounded-xl"></div>
        <div class="w-full h-full absolute top-0 flex flex-col justify-end p-16 space-y-4">
            <h1 class="text-3xl md:text-6xl text-white font-semibold font-display">
                {{ $section->title }}
            </h1>
            <p class="text-sm md:text-lg text-gray-200 font-light">
                {{ $section->description }}
            </p>
        </div>
    </div>
</div>
