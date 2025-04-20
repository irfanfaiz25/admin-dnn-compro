<div
    class="h-fit w-full p-4 bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            Hero Section
        </h3>
        <p class="text-sm text-gray-500 dark:text-gray-400">
            Jumlah Konten: {{ $totalContent }} / {{ $maxContent }}
        </p>
        <div>
            @if (!$isShowForm)
                @if ($totalContent < $maxContent)
                    <button wire:click='handleOpenForm' type="button"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>Tambah</span>
                        <span wire:loading wire:target='handleOpenForm'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                @endif
            @endif
        </div>
    </div>

    {{-- form --}}
    <div wire:show='isShowForm' wire:cloak wire:transition
        class="mb-5 w-full bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
        <form wire:submit.prevent='save'>
            <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
                    {{ $isEditMode ? 'Edit Data' : 'Tambah Data' }}
                </h3>
                <div class="flex space-x-2 justify-end">
                    <button type="button" wire:click='handleCloseForm'
                        class="text-gray-600 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Batal
                        </span>
                        <span wire:loading wire:target='handleCloseForm'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Simpan
                        </span>
                        <span wire:loading wire:target='save'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="flex space-x-5">
                    <div
                        class="w-[35%] space-y-4 bg-gray-50 dark:bg-[#252525] p-4 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-700 hover:border-secondary-green transition-colors duration-300">
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
                                    class="w-full h-60 rounded-lg shadow-md bg-gray-200 dark:bg-neutral-700 flex justify-center items-center">
                                    <i class="fa fa-image text-gray-400"></i>
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
                                class="w-full px-4 py-3 text-sm font-medium text-center rounded-lg border-2 border-dashed border-secondary-green bg-white dark:bg-neutral-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-center gap-2">
                                <i class="fa fa-cloud-upload text-secondary-green"></i>
                                <span class="text-gray-700 dark:text-gray-300">Pilih Gambar Background</span>
                            </div>
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400 text-center">PNG, JPG or JPEG (MAX.
                                2MB)</p>
                        </div>
                    </div>
                    <div class="w-[65%]">
                        <div class="mb-4">
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Judul</label>
                            <input type="text" id="title" wire:model="title"
                                class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-300 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                                placeholder="Judul">
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deskripsi</label>
                            <textarea id="description" rows="4" wire:model="description"
                                class="block p-2.5 w-full text-sm text-gray-900 dark:text-gray-300 bg-gray-50 dark:bg-[#252525] rounded-md border border-gray-300 dark:border-gray-700 focus:outline-gray-400"
                                placeholder="Deskripsi"></textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-3 gap-3">
        {{-- content display --}}
        @foreach ($sections as $section)
            <div class="w-full h-64 relative">
                <img src="{{ asset($section->image_url) }}" alt="{{ $section->title }}"
                    class="w-full h-full object-cover shadow-md">
                <div class="absolute inset-0 bg-black/40"></div>
                <div class="absolute inset-0 px-2 flex flex-col justify-center items-center text-center">
                    <h3 class="text-lg font-display font-bold text-primary-gold mb-1">
                        {{ $section->title }}
                    </h3>
                    <p class="text-xs text-white">
                        {{ $section->description }}
                    </p>
                </div>
                <div class="absolute top-2 right-2 flex space-x-1">
                    <button type="button" wire:click="handleEdit({{ $section->id }})"
                        class="px-3 py-1.5 group bg-white/80 dark:bg-gray-800/80 hover:bg-white dark:hover:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 text-xs rounded-sm backdrop-blur-sm transition-colors duration-200 inline-flex items-center space-x-1">
                        <i wire:loading.remove wire:target="handleEdit({{ $section->id }})"
                            class="fa fa-pencil text-[11px] text-secondary-green group-hover:text-secondary-green"></i>
                        <span wire:loading wire:target="handleEdit({{ $section->id }})"
                            class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                        </span>
                        <span>
                            Edit
                        </span>
                    </button>
                    <button wire:click="delete({{ $section->id }})"
                        wire:confirm='Apakah anda yakin ingin menghapus data ini?'
                        class="px-3 py-1.5 group bg-white/80 dark:bg-gray-800/80 hover:bg-white dark:hover:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 text-xs rounded-sm backdrop-blur-sm transition-colors duration-200 inline-flex items-center space-x-1">
                        <i wire:loading.remove wire:target="delete({{ $section->id }})"
                            class="fa fa-trash text-[11px] pr-0.5 text-tertiary-red group-hover:text-tertiary-red"></i>
                        <span wire:loading wire:target="delete({{ $section->id }})"
                            class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                        </span>
                        <span>
                            Hapus
                        </span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

</div>
