<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Pencapaian
        </h3>
    </div>

    <div class="mb-5 flex justify-center">
        <div class="border border-gray-300 min-w-1/2 max-w-2/3 rounded-md relative">
            <div class="p-8 flex flex-col justify-center items-center text-center">
                <h1 class="text-4xl font-bold font-display mb-1">
                    Pencapaian Kami
                </h1>
                <div class="w-24 h-1.5 bg-primary-gold mt-5 mb-8 rounded-full"></div>
                <p class="text-sm font-medium">
                    Setiap pencapaian kami merupakan bukti nyata dari komitmen untuk memberikan yang terbaik. Didukung
                    oleh tim profesional yang berdedikasi dan kepercayaan pelanggan yang terus bertumbuh bersama kami.
                </p>
                <button
                    class="absolute top-1 right-1 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 hover:text-white text-xs rounded-sm">
                    <i class="fa fa-pencil text-[11px] pr-0.5 text-gray-600 group-hover:text-white"></i>
                    Edit
                </button>
            </div>
            {{-- edit title form --}}
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

    <div class="flex justify-end">
        <button
            class="mb-2 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 hover:text-white text-xs rounded-sm">
            <i class="fa fa-pencil text-[11px] pr-0.5 text-gray-600 group-hover:text-white"></i>
            Edit
        </button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 border border-gray-300 p-4 rounded-md relative">
        @foreach ($stats as $stat)
            <div class="group hover:-translate-y-2 transition-all duration-300">
                <div
                    class="h-auto py-10 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 px-4 md:px-6 flex flex-col justify-center items-center relative overflow-hidden">
                    <div
                        class="{{ $stat['color'] }} h-16 w-16 rounded-full flex justify-center items-center transform group-hover:scale-110 transition-transform duration-300 mb-4">
                        <div
                            class="{{ $stat['iconColor'] }} transform group-hover:rotate-12 transition-transform duration-300">
                            <i class="{{ $stat['icon'] }}"></i>
                        </div>
                    </div>
                    <div class="relative z-10 text-center">
                        <h1 class="text-3xl md:text-4xl font-bold font-display text-gray-800 mb-1">
                            {{ $stat['count'] }}{{ $stat['suffix'] ?? '+' }}
                        </h1>
                        <p class="text-lg font-medium text-gray-600">
                            {{ $stat['label'] }}
                        </p>
                    </div>
                    <div
                        class="absolute -right-12 -bottom-12 w-48 h-48 bg-gray-100/50 rounded-full transform group-hover:scale-150 transition-transform duration-500">
                    </div>
                </div>
            </div>
        @endforeach
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
                <div class="grid grid-cols-3 gap-3">
                    <div class="">
                        <label for="branches" class="block mb-2 text-sm font-medium text-gray-900">Cabang</label>
                        <input type="text" id="branches" name="branches"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan jumlah cabang">
                    </div>
                    <div class="">
                        <label for="employees" class="block mb-2 text-sm font-medium text-gray-900">Karyawan</label>
                        <input type="text" id="employees" name="employees"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan jumlah karyawan">
                    </div>
                    <div class="">
                        <label for="customers" class="block mb-2 text-sm font-medium text-gray-900">Customer</label>
                        <input type="text" id="customers" name="customers"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan jumlah customer">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
