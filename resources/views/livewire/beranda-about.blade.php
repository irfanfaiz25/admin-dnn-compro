<div
    class="h-fit w-full p-4 bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            Tentang
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
        <form wire:submit.prevent='handleSave'>
            <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Edit Data
                </h3>
                <div class="flex space-x-2 justify-end">
                    <button type="button" wire:click='handleCloseForm'
                        class="text-gray-600 dark:text-gray-300 bg-gray-200 dark:bg-[#252525] hover:bg-gray-300 dark:hover:bg-gray-600 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Batal
                        </span>
                        <div wire:loading wire:target='handleCloseForm'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </div>
                    </button>
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Simpan
                        </span>
                        <div wire:loading wire:target='handleSave'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </div>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="flex space-x-5">
                    <div
                        class="w-[35%] space-y-4 bg-gray-50 dark:bg-[#252525] p-4 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600 hover:border-secondary-green transition-colors duration-300">
                        <div class="relative group">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" alt="preview image"
                                    class="w-full h-60 object-cover rounded-md shadow-lg transition-transform duration-300 group-hover:scale-[1.02]">
                                <div
                                    class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white text-sm font-medium">Preview Image</span>
                                </div>
                            @elseif ($existingImage)
                                <img src="{{ asset($existingImage) }}" alt="preview image"
                                    class="w-full h-60 object-cover rounded-md shadow-lg transition-transform duration-300 group-hover:scale-[1.02]">
                                <div
                                    class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white text-sm font-medium">Preview Image</span>
                                </div>
                            @else
                                <div
                                    class="w-full h-60 rounded-lg shadow-md bg-gray-200 dark:bg-[#252525] flex justify-center items-center">
                                    <i wire:loading.remove wire:target='image'
                                        class="fa fa-image text-gray-400 dark:text-gray-300"></i>
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
                                class="w-full px-4 py-3 text-sm font-medium text-center rounded-lg border-2 border-dashed border-secondary-green bg-white dark:bg-[#252525] hover:bg-gray-50 dark:hover:bg-[#252525] transition-colors duration-200 flex items-center justify-center gap-2">
                                <i class="fa fa-cloud-upload text-secondary-green"></i>
                                <span class="text-gray-700 dark:text-gray-300">Pilih Gambar</span>
                            </div>
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400 text-center">PNG, JPG or JPEG (MAX.
                                2MB)</p>
                        </div>
                    </div>
                    <div class="w-[65%] space-y-4">
                        <div class="space-y-2">
                            <label for="aboutImage" class="block text-sm font-medium text-gray-900 dark:text-gray-100">
                                Deskripsi Gambar
                            </label>
                            <textarea id="aboutImage" rows="4" wire:model='aboutContent'
                                class="block p-2.5 w-full text-sm text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-[#252525] rounded-md border border-gray-300 dark:border-gray-600 focus:outline-gray-400 dark:focus:outline-gray-500"
                                placeholder="Masukkan deskripsi gambar"></textarea>
                            @error('aboutContent')
                                <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="aboutTitle"
                                class="block text-sm font-medium text-gray-900 dark:text-gray-100">Judul</label>
                            <input type="text" id="aboutTitle" wire:model='aboutTitle'
                                class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 dark:focus:outline-gray-500 block w-full p-2.5"
                                placeholder="Judul">
                            @error('aboutTitle')
                                <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="aboutDescription"
                                class="block text-sm font-medium text-gray-900 dark:text-gray-100">Deskripsi</label>
                            <textarea id="aboutDescription" rows="4" wire:model='aboutDescription'
                                class="block p-2.5 w-full text-sm text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-[#252525] rounded-md border border-gray-300 dark:border-gray-600 focus:outline-gray-400 dark:focus:outline-gray-500"
                                placeholder="Deskripsi"></textarea>
                            @error('aboutDescription')
                                <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- content display --}}
    <div class="w-full flex space-x-5">
        {{-- text --}}
        <div class="w-[60%] p-5 flex flex-col justify-center rounded-md relative">
            <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold font-display mb-3">
                {{ $section->title }}
            </h1>
            <p class="text-base text-gray-600 dark:text-gray-300 max-w-lg">
                {{ $section->description }}
            </p>
            <div class="mt-4">
                <button class="px-4 py-2 bg-primary-gold text-white text-sm rounded-sm">
                    Lebih Lanjut
                </button>
            </div>
        </div>
        {{-- image --}}
        <div class="w-[40%] relative">
            <img src="{{ asset($section->image_url) }}" alt="picture1" class="w-full h-full object-cover rounded-md">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-md"></div>
            {{-- description --}}
            <div class="absolute bottom-0 w-full p-3 bg-black/20 backdrop-blur-sm text-xs text-white rounded-b-md">
                {{ $section->content }}
            </div>
        </div>
    </div>
</div>
