<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Hero Section
        </h3>
        <p class="text-sm text-gray-500">
            Jumlah Konten: {{ $totalContent }} / {{ $maxContent }}
        </p>
        <button wire:click='handleOpenForm' type="button"
            class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
            <span>Tambah</span>
            <div wire:loading wire:target='handleOpenForm'
                class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
            </div>
        </button>
    </div>

    {{-- form --}}
    <div wire:show='isShowForm' wire:cloak wire:transition
        class="mb-5 w-full bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
        <form wire:submit.prevent='save'>
            <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300">
                <h3 class="text-lg font-semibold text-gray-600">
                    Tambah Data
                </h3>
                <div class="flex space-x-2 justify-end">
                    <button type="button" wire:click='handleCloseForm'
                        class="text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Batal</button>
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Simpan</button>
                </div>
            </div>
            <div class="p-4">
                <div class="flex space-x-5">
                    <div
                        class="w-[35%] space-y-4 bg-gray-50 p-4 rounded-lg border-2 border-dashed border-gray-300 hover:border-secondary-green transition-colors duration-300">
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
                                    class="w-full h-60 rounded-lg shadow-md bg-gray-200 flex justify-center items-center">
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
                                class="w-full px-4 py-3 text-sm font-medium text-center rounded-lg border-2 border-dashed border-secondary-green bg-white hover:bg-gray-50 transition-colors duration-200 flex items-center justify-center gap-2">
                                <i class="fa fa-cloud-upload text-secondary-green"></i>
                                <span class="text-gray-700">Pilih Gambar Background</span>
                            </div>
                            <p class="mt-2 text-xs text-gray-500 text-center">PNG, JPG or JPEG (MAX. 2MB)</p>
                        </div>
                    </div>
                    <div class="w-[65%]">
                        <div class="mb-4">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                            <input type="text" id="title" wire:model="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                                placeholder="Judul">
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                            <textarea id="description" rows="4" wire:model="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300  focus:outline-gray-400"
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
                        class="px-3 py-1.5 group border border-white hover:bg-white text-white hover:text-gray-800 text-xs rounded-sm inline-flex items-center space-x-1">
                        <i wire:loading.remove wire:target="handleEdit({{ $section->id }})"
                            class="fa fa-pencil text-[11px] text-white group-hover:text-secondary-green"></i>
                        <span wire:loading wire:target="handleEdit({{ $section->id }})"
                            class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                        </span>
                        <span>
                            Edit
                        </span>
                    </button>
                    <button wire:click="delete({{ $section->id }})"
                        wire:confirm='Apakah anda yakin ingin menghapus data ini?'
                        class="px-3 py-1.5 group border border-white hover:bg-white text-white hover:text-gray-800 text-xs rounded-sm inline-flex items-center space-x-1">
                        <i wire:loading.remove wire:target="delete({{ $section->id }})"
                            class="fa fa-trash text-[11px] pr-0.5 text-white group-hover:text-tertiary-red"></i>
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
