<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Hero Section
        </h3>
    </div>

    <div class="w-full min-h-[600px] relative overflow-hidden flex flex-col justify-center">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="/img/picture1.jpg" alt="Team Background" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <!-- Content Container -->
        <div
            class="container mx-auto px-4 md:px-0 lg:px-14 h-full flex flex-col md:flex-row items-center justify-center md:justify-between relative z-10 py-20">
            <button
                class="absolute -top-6 right-3 px-3 py-1.5 group border border-white hover:bg-white text-white hover:text-gray-700 text-xs rounded-sm">
                <i class="fa fa-pencil text-[11px] pr-0.5 text-white group-hover:text-gray-700"></i>
                Edit
            </button>
            <!-- Text Content -->
            <div class="md:w-1/2 text-left md:pr-8 mb-12 md:mb-0">
                <div class="h-1.5 bg-primary-gold mb-6 rounded-full w-20"></div>
                <h1 class="text-3xl md:text-5xl font-display font-bold text-white mb-3 leading-tight">
                    Tim <span class="text-primary-gold">Manajemen</span> Kami
                </h1>
                <p class="text-base md:text-lg text-gray-200 max-w-xl mb-8">
                    Kami adalah tim yang berdedikasi untuk memberikan produk
                    berkualitas tinggi dengan standar layanan terbaik untuk kepuasan
                    pelanggan.
                </p>
                <button
                    class="px-8 py-3 bg-primary-gold text-gray-900 text-base font-medium rounded-full hover:bg-primary-gold/90 transition-all duration-300 shadow-lg hover:scale-105 active:scale-98">
                    Kenali Kami
                </button>
            </div>

            <!-- Image or Visual Element -->
            <div class="relative">
                <div class="relative">
                    <!-- Team stats card -->
                    <div
                        class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl border border-white/20 shadow-2xl max-w-md mx-auto">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-white">
                                Manajemen
                            </h3>
                            <span class="px-3 py-1 bg-primary-gold/20 text-primary-gold rounded-full text-sm">
                                Kepemimpinan
                            </span>
                        </div>

                        <div class="mb-6 space-y-4">
                            @foreach ($manajemen as $item)
                                <div key="{{ $item['id'] }}" class="flex items-center gap-3">
                                    <div
                                        class="w-12 h-12 bg-primary-gold/30 rounded-full flex items-center justify-center">
                                        <span class="text-primary-gold text-lg font-bold">
                                            {{ substr($item['name'], 0, 1) }}
                                        </span>
                                    </div>
                                    <div>
                                        <h4 class="text-white text-base font-medium">{{ $item['name'] }}</h4>
                                        <p class="text-gray-300 text-xs">{{ $item['position'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="pt-4 border-t border-white/20">
                            <p class="text-gray-300 text-xs">
                                Tim manajemen kami mengedepankan keunggulan dan inovasi
                                untuk menghadirkan produk berkualitas premium yang memenuhi
                                standar industri tertinggi.
                            </p>
                        </div>
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
                <div class="w-full flex space-x-5">
                    <div class="w-1/2 space-y-4">
                        <div class="space-y-3">
                            <img src="/img/picture1.jpg" alt="picture" class="w-full h-72 object-cover shadow-md">
                            <div class="flex space-x-2">
                                <button type="button"
                                    class="w-full text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Batal</button>
                                <button type="button"
                                    class="w-full text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center">Ubah</button>
                            </div>
                        </div>
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
                    <div class="w-1/2">
                        <h3 class="text-xl font-semibold text-gray-800 mb-8">
                            Manajemen
                        </h3>
                        <div class="space-y-10">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="flex space-x-3 items-center">
                                    <div class="w-[5%]">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="active{{ $i }}"
                                                name="active{{ $i }}"
                                                class="w-4 h-4 text-secondary-green bg-gray-100 border-gray-300 rounded focus:ring-secondary-green">
                                        </div>
                                    </div>
                                    <div class="w-[18%]">
                                        <div
                                            class="w-24 h-24 bg-gray-200 border-2 border-gray-400 rounded-full flex justify-center items-center relative">
                                            <i class="fa fa-camera text-gray-400"></i>
                                            <i
                                                class="absolute -top-1 right-1 p-1.5 bg-gray-400 fa fa-pencil text-xs text-white rounded-full"></i>
                                        </div>
                                    </div>
                                    <div class="w-[77%] space-y-2">
                                        <input type="text" id="name" name="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                                            placeholder="Nama">
                                        <input type="text" id="position" name="position"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                                            placeholder="Jabatan">
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
