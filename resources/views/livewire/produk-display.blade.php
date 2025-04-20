<div
    class="h-fit w-full p-4 bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            Daftar Produk
        </h3>
        @if (!$isShowForm)
            <button wire:click='handleOpenForm' type="button"
                class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                <span>Tambah</span>
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
            <div class="p-4">
                <div class="mb-8 flex space-x-6">
                    <div
                        class="w-1/2 space-y-4 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-700 hover:border-secondary-green transition-colors duration-300">
                        <label class="block">
                            <span class="text-base font-semibold text-gray-900 dark:text-gray-100 block mb-1">
                                Gambar Detail
                            </span>
                            <span class="text-sm text-red-500 italic flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                Unggah gambar detail produk dengan latar belakang yang menarik
                            </span>
                        </label>
                        <div class="relative group">
                            @if ($detailImage)
                                <img src="{{ $detailImage->temporaryUrl() }}" alt="preview image"
                                    class="w-full h-80 object-cover rounded-md shadow-lg transition-transform duration-300 group-hover:scale-[1.02]">
                                <div
                                    class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white text-sm font-medium">Preview Image</span>
                                </div>
                            @elseif ($existingDetailImage)
                                <img src="{{ asset($existingDetailImage) }}" alt="preview image"
                                    class="w-full h-80 object-cover rounded-md shadow-lg transition-transform duration-300 group-hover:scale-[1.02]">
                                <div
                                    class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white text-sm font-medium">Preview Image</span>
                                </div>
                            @else
                                <div
                                    class="w-full h-80 rounded-lg shadow-md bg-gray-200 dark:bg-gray-700 flex justify-center items-center">
                                    <i class="fa fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </div>
                        @error('detailImage')
                            <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                        @enderror
                        <div class="relative">
                            <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                accept="image/*" wire:model="detailImage">
                            <div
                                class="w-full px-4 py-3 text-sm font-medium text-center rounded-lg border-2 border-dashed border-secondary-green bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200 flex items-center justify-center gap-2">
                                <i class="fa fa-cloud-upload text-secondary-green"></i>
                                <span class="text-gray-700 dark:text-gray-300">Pilih Gambar</span>
                            </div>
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400 text-center">
                                PNG, JPG or JPEG (MAX. 2MB)
                                <span class="text-sm text-red-500">*</span>
                            </p>
                        </div>
                    </div>

                    <div
                        class="w-1/2 space-y-4 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-700 hover:border-secondary-green transition-colors duration-300">
                        <label class="block">
                            <span class="text-base font-semibold text-gray-900 dark:text-gray-100 block mb-1">
                                Gambar Kemasan
                            </span>
                            <span class="text-sm text-red-500 italic flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                Unggah gambar produk tanpa latar belakang dan posisikan produk di tengah frame
                            </span>
                        </label>
                        <div class="relative group">
                            @if ($packImage)
                                <div
                                    class="w-full h-80 bg-[#f0f0f0] dark:bg-gray-700 bg-[linear-gradient(45deg,#ccc_25%,transparent_25%),linear-gradient(-45deg,#ccc_25%,transparent_25%),linear-gradient(45deg,transparent_75%,#ccc_75%),linear-gradient(-45deg,transparent_75%,#ccc_75%)] bg-[length:20px_20px] bg-[position:0_0,0_10px,10px_-10px,-10px_0] rounded-md flex items-center justify-center">
                                    <img src="{{ $packImage->temporaryUrl() }}" alt="preview image"
                                        class="w-full h-80 object-contain transition-transform duration-300 group-hover:scale-[1.02]">
                                    <div
                                        class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <span class="text-white text-sm font-medium">Preview PNG Image</span>
                                    </div>
                                </div>
                            @elseif ($existingPackImage)
                                <div
                                    class="w-full h-80 bg-[#f0f0f0] dark:bg-gray-700 bg-[linear-gradient(45deg,#ccc_25%,transparent_25%),linear-gradient(-45deg,#ccc_25%,transparent_25%),linear-gradient(45deg,transparent_75%,#ccc_75%),linear-gradient(-45deg,transparent_75%,#ccc_75%)] bg-[length:20px_20px] bg-[position:0_0,0_10px,10px_-10px,-10px_0] rounded-md flex items-center justify-center">
                                    <img src="{{ asset($existingPackImage) }}" alt="preview image"
                                        class="w-full h-80 object-contain transition-transform duration-300 group-hover:scale-[1.02]">
                                    <div
                                        class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <span class="text-white text-sm font-medium">Preview PNG Image</span>
                                    </div>
                                </div>
                            @else
                                <div
                                    class="w-full h-80 bg-[#f0f0f0] dark:bg-gray-700 bg-[linear-gradient(45deg,#ccc_25%,transparent_25%),linear-gradient(-45deg,#ccc_25%,transparent_25%),linear-gradient(45deg,transparent_75%,#ccc_75%),linear-gradient(-45deg,transparent_75%,#ccc_75%)] bg-[length:20px_20px] bg-[position:0_0,0_10px,10px_-10px,-10px_0] rounded-md flex items-center justify-center">
                                    <i class="fa fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </div>
                        @error('packImage')
                            <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                        @enderror
                        <div class="relative">
                            <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                accept="image/*" wire:model="packImage">
                            <div
                                class="w-full px-4 py-3 text-sm font-medium text-center rounded-lg border-2 border-dashed border-secondary-green bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200 flex items-center justify-center gap-2">
                                <i class="fa fa-cloud-upload text-secondary-green"></i>
                                <span class="text-gray-700 dark:text-gray-300">Pilih Gambar</span>
                            </div>
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400 text-center">
                                PNG (MAX. 2MB)
                                <span class="text-sm text-red-500">*</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-4 flex justify-between gap-3">
                    <div class="w-[40%]">
                        <label for="productName"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Nama
                            Produk <span class="text-sm text-red-500">*</span></label>
                        <input type="text" id="productName" wire:model="productName"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan nama produk">
                        @error('productName')
                            <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-[30%]">
                        <label for="series"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Seri <span
                                class="text-sm text-red-500">*</span></label>
                        <input type="text" id="series" wire:model="series"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan seri produk">
                        @error('series')
                            <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-[30%]">
                        <label for="stock"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Status <span
                                class="text-sm text-red-500">*</span></label>
                        <select id="stock" wire:model.live="stock"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5">
                            <option value="">Pilih Status</option>
                            <option value="1">Dalam Stok</option>
                            <option value="0">Habis</option>
                        </select>
                        @error('stock')
                            <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="productDescription"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Deksripsi
                        <span class="text-sm text-red-500">*</span></label>
                    <textarea id="productDescription" rows="3" wire:model="productDescription"
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                        placeholder="Masukkan deskripsi produk"></textarea>
                    @error('productDescription')
                        <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 flex justify-between gap-3">
                    <div class="w-1/2">
                        <label for="racikan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                            Racikan <span class="text-sm text-red-500">*</span>
                        </label>
                        <input type="text" id="racikan" wire:model="racikan"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan racikan">
                        @error('racikan')
                            <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="character"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                            Karakter <span class="text-sm text-red-500">*</span>
                        </label>
                        <input type="text" id="character" wire:model="karakter"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan karakter produk">
                        @error('karakter')
                            <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 flex justify-between gap-3">
                    <div class="w-1/2">
                        <label for="rempah"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Rempah <span
                                class="text-sm text-red-500">*</span></label>
                        <input type="text" id="rempah" wire:model="rempah"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan kandungan rempah produk">
                        @error('rempah')
                            <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="packing"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Kemasan <span
                                class="text-sm text-red-500">*</span></label>
                        <input type="number" id="packing" wire:model="kemasan"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan jumlah produk dalam kemasan">
                        @error('kemasan')
                            <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Display Product List --}}
    <div class="space-y-3">
        @foreach ($products as $product)
            <div class="p-4 flex space-x-5 border border-gray-300 dark:border-gray-700 rounded-md">
                <div class="w-[40%]">
                    <img src="{{ asset($product->detailImage) }}" alt="picture1"
                        class="w-full h-full object-cover rounded-md">
                </div>
                <div class="w-[60%] relative">
                    <div class="flex space-x-1 absolute top-0 right-0">
                        <button type="button" wire:click='handleEdit({{ $product->id }})'
                            class="px-3 py-1.5 border border-gray-600 dark:border-gray-400 hover:bg-gray-600 dark:hover:bg-gray-700 text-gray-600 dark:text-gray-400 hover:text-white text-sm rounded-sm z-50 inline-flex items-center">
                            <i wire:loading.remove wire:target="handleEdit({{ $product->id }})"
                                class="fa fa-pencil text-[12px] pr-1"></i>
                            <span wire:loading wire:target="handleEdit({{ $product->id }})"
                                class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                            </span>
                            <span>
                                Edit
                            </span>
                        </button>
                        <button type="button" wire:click='handleDelete({{ $product->id }})'
                            wire:confirm="Apakah Anda yakin ingin menghapus produk ini?"
                            class="px-3 py-1.5 border border-red-600 hover:bg-red-600 text-red-600 hover:text-white text-sm rounded-sm z-50 inline-flex items-center">
                            <i wire:loading.remove wire:target="handleDelete({{ $product->id }})"
                                class="fa fa-trash text-[12px] pr-1"></i>
                            <span wire:loading wire:target="handleDelete({{ $product->id }})"
                                class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                            </span>
                            <span>
                                Hapus
                            </span>
                        </button>
                    </div>
                    <h1 class="text-4xl font-extrabold font-display text-gray-900 dark:text-gray-100">
                        {{ $product->name }}
                    </h1>
                    <div class="mt-3 flex space-x-2">
                        <div
                            class="px-4 py-1.5 text-sm bg-amber-600/50 text-amber-700 dark:bg-amber-900/50 dark:text-amber-300 rounded-full font-medium shadow-md">
                            {{ $product->series }}
                        </div>
                        <div
                            class="px-4 py-1.5 text-sm bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-full font-medium shadow-md">
                            {{ $product->stock ? 'In Stock' : 'Out of Stock' }}
                        </div>
                    </div>
                    <p class="mt-6 text-base text-gray-600 dark:text-gray-300">
                        {{ $product->description }}
                    </p>
                    <div class="mt-6 space-y-3">
                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <h4 class="text-sm text-gray-500 dark:text-gray-400">
                                    RACIKAN
                                </h4>
                                <p class="text-sm text-gray-800 dark:text-gray-200">
                                    {{ $product->racikan }}
                                </p>
                            </div>
                            <div class="w-1/2">
                                <h4 class="text-sm text-gray-500 dark:text-gray-400">
                                    KARAKTER
                                </h4>
                                <p class="text-sm text-gray-800 dark:text-gray-200">
                                    {{ $product->karakter }}
                                </p>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <h4 class="text-sm text-gray-500 dark:text-gray-400">
                                    REMPAH
                                </h4>
                                <p class="text-sm text-gray-800 dark:text-gray-200">
                                    {{ $product->rempah }}
                                </p>
                            </div>
                            <div class="w-1/2">
                                <h4 class="text-sm text-gray-500 dark:text-gray-400">
                                    KEMASAN
                                </h4>
                                <p class="text-sm text-gray-800 dark:text-gray-200">
                                    {{ $product->kemasan }} Batang Premium
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
