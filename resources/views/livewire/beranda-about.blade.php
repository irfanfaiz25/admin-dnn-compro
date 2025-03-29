<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md">
    <div class="pb-4">
        <h3 class="text-lg font-semibold text-gray-600">
            Tentang
        </h3>
    </div>
    {{-- content display --}}
    <div class="w-full flex space-x-5">
        {{-- text --}}
        <div class="w-[60%] p-5 flex flex-col justify-center border border-gray-300 rounded-md relative">
            <h1 class="text-3xl text-gray-800 font-bold font-display mb-3">
                Komitmen Kami
            </h1>
            <p class="text-base text-gray-600 max-w-lg">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat provident iusto tempora, qui itaque
                asperiores voluptatum, magni, unde porro veritatis assumenda veniam? Nulla consectetur sint libero quam
                expedita. Unde, iusto.
            </p>
            <div class="mt-4">
                <button class="px-4 py-2 bg-primary-gold text-white text-sm rounded-sm">
                    Lebih Lanjut
                </button>
            </div>
            {{-- edit button --}}
            <button
                class="absolute top-2 right-2 px-3 py-1.5 group border border-gray-700 hover:bg-gray-700 text-gray-700 hover:text-gray-50 text-xs rounded-sm">
                <i class="fa fa-pencil text-[11px] pr-0.5 text-gray-700 group-hover:text-white"></i>
                Edit
            </button>
        </div>
        {{-- image --}}
        <div class="w-[40%] relative">
            <img src="/img/picture1.jpg" alt="picture1" class="w-full h-full object-cover rounded-md">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-md"></div>
            {{-- edit button --}}
            <button
                class="absolute top-2 right-2 px-3 py-1.5 group border border-white hover:bg-white text-white hover:text-gray-800 text-xs rounded-sm">
                <i class="fa fa-pencil text-[11px] pr-0.5 text-white group-hover:text-secondary-green"></i>
                Edit
            </button>
            {{-- description --}}
            <div class="absolute bottom-0 w-full p-3 bg-black/20 backdrop-blur-sm text-xs text-white rounded-b-md">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum sequi unde quos corrupti blanditiis
                nam corporis incidunt officiis dolores deleniti impedit, ipsam, ad in animi. Dolor impedit nemo
                accusamus ullam.
            </div>
        </div>
    </div>

    {{-- form --}}
    <div class="mt-5 w-full bg-white backdrop-blur-md border border-gray-300 rounded-md">
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
                {{-- <div class="flex space-x-5">
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
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi
                                Gambar</label>
                            <textarea id="description" name="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300  focus:outline-gray-400"
                                placeholder="Masukkan deskripsi gambar"></textarea>
                        </div>

                    </div>
                </div> --}}
                <div class="w-full space-y-4">
                    <div class="space-y-2">
                        <label for="title" class="block text-sm font-medium text-gray-900">Judul</label>
                        <input type="text" id="title" name="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Judul">
                    </div>
                    <div class="space-y-2">
                        <label for="description" class="block text-sm font-medium text-gray-900">Deskripsi</label>
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300  focus:outline-gray-400"
                            placeholder="Deskripsi"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
