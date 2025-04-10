<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Keunggulan Produk
        </h3>
        <button type="button"
            class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Tambah</button>
    </div>
    {{-- headline --}}
    <div class="mb-5 flex justify-center">
        <div class="border border-gray-300 min-w-1/2 rounded-md relative">
            <div class="p-8 flex flex-col justify-center items-center text-center">
                <h1 class="text-4xl font-bold font-display mb-1">
                    Pusaka Warisan Nusantara
                </h1>
                <div class="w-24 h-1.5 bg-primary-gold mt-5 mb-8 rounded-full"></div>
                <p class="text-sm font-medium">
                    Menghadirkan Pengalaman Tembakau Premium Khas Nusantara
                </p>
                <button
                    class="absolute top-1 right-1 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 hover:text-white text-xs rounded-sm">
                    <i class="fa fa-pencil text-[11px] pr-0.5 text-gray-600 group-hover:text-white"></i>
                    Edit
                </button>
            </div>
            {{-- <div class="p-4">
                <div class="mb-2">
                    <input type="text" id="title" name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-200 block w-full p-2.5"
                        placeholder="Judul">
                </div>
                <div class="mb-2">
                    <textarea id="description" name="description" rows="2"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300  focus:outline-gray-400"
                        placeholder="Deskripsi"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Simpan</button>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="grid grid-cols-3 gap-3">
        {{-- content display --}}
        @for ($i = 0; $i < 3; $i++)
            <div class="w-full h-fit border border-gray-300 rounded-md relative">
                <img src="/img/picture1.jpg" alt="picture1" class="w-full h-52 object-cover rounded-t-md">
                <div class="w-full p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-1">
                        Cita Rasa Khas Nusantara
                    </h3>
                    <p class="text-base text-gray-600">
                        Memadukan resep tradisional dengan teknologi modern untuk menghadirkan pengalaman rasa yang tak
                        tertandingi
                    </p>
                </div>
                <div class="absolute top-2 right-2 flex space-x-1">
                    <button
                        class="px-3 py-1.5 group border border-white hover:bg-white text-white hover:text-gray-800 text-xs rounded-sm">
                        <i class="fa fa-pencil text-[11px] pr-0.5 text-white group-hover:text-secondary-green"></i>
                        Edit
                    </button>
                    <button
                        class="px-3 py-1.5 group border border-white hover:bg-white text-white hover:text-gray-800 text-xs rounded-sm">
                        <i class="fa fa-trash text-[11px] pr-0.5 text-white group-hover:text-tertiary-red"></i>
                        Hapus
                    </button>
                </div>
            </div>
        @endfor
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
                <div class="flex space-x-5">
                    <div class="w-[35%] space-y-2">
                        <img src="/img/picture1.jpg" alt="picture1"
                            class="w-full h-60 object-cover rounded-md shadow-lg">
                        <div class="flex space-x-2">
                            <button type="button"
                                class="w-full text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Hapus</button>
                            <button type="submit"
                                class="w-full text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Ubah</button>
                        </div>
                    </div>
                    <div class="w-[65%]">
                        <div class="mb-4">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                            <input type="text" id="title" name="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                                placeholder="Judul">
                        </div>
                        <div class="mb-4">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                            <textarea id="description" name="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300  focus:outline-gray-400"
                                placeholder="Deskripsi"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
