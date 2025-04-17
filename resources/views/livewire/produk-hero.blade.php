<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Hero Section
        </h3>
    </div>

    {{-- form --}}
    <form wire:submit.prevent="save">
        <div class="mb-4 w-full relative">
            <img src="/img/picture1.jpg" alt="picture" class="w-full h-[600px] object-cover shadow-md">
            <div class="w-full h-full absolute top-0 bg-gradient-to-t from-black/80 to-transparent"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <h1 class="text-2xl md:text-6xl text-gray-50 font-semibold font-display text-center">
                    Produk Kami
                </h1>
                <p class="mt-4 min-w-3xl md:mt-2 text-sm/5 md:text-lg/7 text-gray-200 font-normal text-center">
                    Tembakau premium kami diperkaya dengan perpaduan rempah-rempah
                    nusantara yang memikat. Setiap hisapan menghadirkan sensasi cengkeh
                    pilihan yang menghangatkan, aroma kayu manis yang menenangkan, dan
                    sentuhan kapulaga yang menyegarkan. Diproses dengan kearifan
                    tradisional dan teknologi modern, menciptakan harmoni rasa yang
                    memanjakan para penikmat rokok premium sejati.
                </p>
            </div>
            <button
                class="absolute top-2 right-2 px-3 py-1.5 group border border-gray-50 hover:bg-gray-50 text-gray-50 hover:text-gray-800 text-xs rounded-sm">
                <i class="fa fa-pencil text-[11px] pr-0.5"></i>
                Edit
            </button>
        </div>
        <div class="relative mb-4 group">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar Background
                Judul</label>
            <div class="flex space-x-2 items-center justify-center w-full">
                <label for="image-upload"
                    class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all duration-300 relative overflow-hidden group">
                    <div class="flex space-x-2 items-center justify-center p-5">
                        <svg class="w-8 h-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <div class="space-y-0">
                            <p class="text-sm text-gray-500">
                                <span class="font-semibold">
                                    Click to upload
                                </span>
                            </p>
                            <p class="text-xs text-gray-500">PNG, JPG or JPEG (MAX. 2MB)</p>
                        </div>
                    </div>
                    <input id="image-upload" type="file" wire:model="image" class="hidden" accept="image/*" />
                </label>
                @if ($image)
                    <button
                        class="flex flex-col items-center justify-center w-[30%] h-24 text-base font-bold border-2 border-red-300 border-dashed rounded-lg cursor-pointer bg-red-50 hover:bg-red-100 text-red-700 transition-all duration-300 relative overflow-hidden group">
                        Cancel Upload
                    </button>
                @endif
            </div>
            @error('image')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
            <input type="text" id="title" wire:model="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                placeholder="Judul">
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
            <textarea rows="3"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                id="" placeholder="Masukkan deskripsi"></textarea>
        </div>

        <div class="flex space-x-2 justify-end mt-4">
            <button type="button"
                class="text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">Batal</button>
            <button type="submit"
                class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">Simpan</button>
        </div>
    </form>
</div>
