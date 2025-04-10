<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Hero Section
        </h3>
    </div>

    <div class="w-full h-[500px] relative">
        <img src="/img/news-background.jpg" alt="news-background"
            class="w-full h-full rounded-xl object-cover shadow-xl" />
        <div class="w-full h-full absolute top-0 bg-gradient-to-t from-black/90 to-transparent rounded-xl"></div>
        <div class="w-full h-full absolute top-0 flex flex-col justify-end p-16 space-y-4">
            <h1 class="text-3xl md:text-6xl text-white font-semibold font-display">
                Revolusi Rasa
            </h1>
            <p class="text-sm md:text-lg text-gray-200 font-light">
                Saksikan perjalanan transformatif kami dalam menghadirkan inovasi
                yang mengubah industri. Dari setiap langkah revolusioner, peluncuran
                produk breakthrough, hingga momen-momen bersejarah yang membentuk
                DNA perusahaan kami. Temukan kisah di balik setiap pencapaian dan
                jadilah bagian dari revolusi yang kami bangun untuk masa depan
                Indonesia.
            </p>
        </div>
        <button
            class="absolute top-3 right-3 px-3 py-1.5 group bg-gray-50 hover:bg-gray-100 text-gray-800 text-sm rounded-sm">
            <i class="fa fa-pencil text-[11px] pr-0.5"></i>
            Edit
        </button>
    </div>

    {{-- form --}}
    <div class="mt-5 w-full bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
        <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300">
            <h3 class="text-lg font-semibold text-gray-600">
                Form
            </h3>
            <div class="flex space-x-2 justify-end">
                <button type="button"
                    class="text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Batal</button>
                <button type="submit"
                    class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Simpan</button>
            </div>
        </div>
        <div class="p-4">
            <form>
                <div class="relative mb-4 group">
                    <div class="flex justify-between items-center gap-2 mb-2">
                        <label for="image" class="block text-sm font-medium text-gray-900">Gambar Background
                            Judul</label>
                        @if ($image)
                            <button type="button"
                                class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                                Batal Unggah
                            </button>
                        @endif
                    </div>
                    <div class="flex space-x-2 items-center justify-center w-full">
                        @if ($image)
                            <div class="w-full h-[500px] relative">
                                <img src="{{ $image->temporaryUrl() }}" alt="news-background"
                                    class="w-full h-full rounded-xl object-cover shadow-xl" />
                            </div>
                        @else
                            <label for="image-upload"
                                class="flex flex-col items-center justify-center w-full h-[500px] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all duration-300 relative overflow-hidden group">
                                <div class="flex space-x-2 items-center justify-center p-5">
                                    <svg class="w-8 h-8 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
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
                                <input id="image-upload" type="file" wire:model="image" class="hidden"
                                    accept="image/*" />
                            </label>
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
                        class="text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Batal</button>
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
