<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Daftar Produk
        </h3>
        <button type="button"
            class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Tambah</button>
    </div>

    <div class="p-4 flex space-x-5 border border-gray-300 rounded-md">
        <div class="w-[40%]">
            <img src="/img/picture1.jpg" alt="picture1" class="w-full h-full object-cover rounded-md">
        </div>
        <div class="w-[60%]">
            <h1 class="text-4xl font-extrabold font-display">
                Mataram Nusantara
            </h1>
            <div class="mt-3 flex space-x-2">
                <div class="px-4 py-1.5 text-sm bg-amber-600/50 text-amber-700 rounded-full font-medium shadow-md">
                    Premium Blend
                </div>
                <div class="px-4 py-1.5 text-sm bg-gray-100 text-gray-600 rounded-full font-medium shadow-md">
                    In Stock
                </div>
            </div>
            <p class="mt-6 text-base text-gray-600">
                Kedhaton Nusantara merupakan manifestasi dari keanggunan cita rasa klasik yang dipadukan dengan sentuhan
                modernitas. Diproduksi secara eksklusif dengan tembakau pilihan dari lembah-lembah subur Nusantara,
                setiap batang merupakan hasil kurasi yang ketat dan proses pemeraman yang sempurna.
            </p>
            <div class="mt-6 space-y-3">
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <h4 class="text-sm text-gray-500">
                            RACIKAN
                        </h4>
                        <p class="text-sm text-gray-800">
                            Tembakau Virginia & Oriental Premium
                        </p>
                    </div>
                    <div class="w-1/2">
                        <h4 class="text-sm text-gray-500">
                            KARAKTER
                        </h4>
                        <p class="text-sm text-gray-800">
                            Sedang dan Lembut
                        </p>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <h4 class="text-sm text-gray-500">
                            REMPAH
                        </h4>
                        <p class="text-sm text-gray-800">
                            Kayu Manis & Cengkeh
                        </p>
                    </div>
                    <div class="w-1/2">
                        <h4 class="text-sm text-gray-500">
                            KEMASAN
                        </h4>
                        <p class="text-sm text-gray-800">
                            12 Batang Premium
                        </p>
                    </div>
                </div>
            </div>
        </div>
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
                <div class="mb-6 flex space-x-3">
                    <div class="w-1/2 space-y-2">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900">
                            Gambar Detail
                            <p class="italic text-red-400">
                                (Unggah gambar detail produk dengan latar belakang yang menarik)
                            </p>
                        </label>
                        <img src="/img/picture1.jpg" alt="picture1"
                            class="w-full h-80 object-cover rounded-md shadow-lg">
                        <div class="flex space-x-2">
                            <button type="button"
                                class="w-full text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Batal</button>
                            <button type="button"
                                class="w-full text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Ubah</button>
                        </div>
                    </div>
                    <div class="w-1/2 space-y-2">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900">
                            Gambar Kemasan
                            <p class="italic text-red-400">
                                (Unggah gambar produk tanpa latar belakang dan posisikan produk tepat di tengah frame)
                            </p>
                        </label>
                        <img src="/img/pack-kedhaton.png" alt="picture1"
                            class="w-full h-80 object-contain rounded-md shadow-lg">
                        <div class="flex space-x-2">
                            <button type="button"
                                class="w-full text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Batal</button>
                            <button type="button"
                                class="w-full text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Ubah</button>
                        </div>
                    </div>
                </div>
                <div class="mb-4 flex justify-between gap-3">
                    <div class="w-[40%]">
                        <label for="productName" class="block mb-2 text-sm font-medium text-gray-900">Nama
                            Produk</label>
                        <input type="text" id="productName" name="productName"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan nama produk">
                    </div>
                    <div class="w-[30%]">
                        <label for="series" class="block mb-2 text-sm font-medium text-gray-900">Seri</label>
                        <input type="text" id="series" name="series"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan seri produk">
                    </div>
                    <div class="w-[30%]">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                        <select type="text" id="address" name="address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan alamat cabang">
                            <option value="in_stock">Dalam Stok</option>
                            <option value="out_stock">Habis</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deksripsi</label>
                    <textarea id="description" rows="3"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                        placeholder="Masukkan deskripsi produk"></textarea>
                </div>
                <div class="mb-4 flex justify-between gap-3">
                    <div class="w-1/2">
                        <label for="racikan" class="block mb-2 text-sm font-medium text-gray-900">
                            Racikan
                        </label>
                        <input type="text" id="racikan" name="racikan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan racikan">
                    </div>
                    <div class="w-1/2">
                        <label for="character" class="block mb-2 text-sm font-medium text-gray-900">
                            Karakter
                        </label>
                        <input type="text" id="character" name="character"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan karakter produk">
                    </div>
                </div>
                <div class="mb-4 flex justify-between gap-3">
                    <div class="w-1/2">
                        <label for="rempah" class="block mb-2 text-sm font-medium text-gray-900">Rempah</label>
                        <input type="text" id="rempah" name="rempah"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan kandungan rempah produk">
                    </div>
                    <div class="w-1/2">
                        <label for="packing" class="block mb-2 text-sm font-medium text-gray-900">Kemasan</label>
                        <input type="number" id="packing" name="packing"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan jumlah produk dalam kemasan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
