<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Sejarah
        </h3>
    </div>

    <div class="mt-2 grid grid-cols-2 gap-3">
        <div class="p-8 border border-gray-300 rounded-lg shadow-md">
            <div class="space-y-5 relative">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-10 bg-secondary-green rounded-full"></div>
                    <h2 class="text-3xl font-bold text-gray-800">Visi</h2>
                </div>
                <button
                    class="absolute top-0 right-0 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 hover:text-white text-sm rounded-sm">
                    <i class="fa fa-pencil text-[11px] pr-0.5 text-gray-600 group-hover:text-white"></i>
                    Edit
                </button>
                <p class="text-base text-gray-600 leading-relaxed pl-5">
                    "Menjadi perusahaan perdagangan terkemuka di Indonesia yang diakui secara nasional dan
                    internasional,
                    dengan memberikan nilai tambah berkelanjutan bagi seluruh pemangku kepentingan melalui praktik
                    bisnis
                    yang inovatif dan bertanggung jawab."
                </p>
            </div>
        </div>
        <div class="p-8 border border-gray-300 rounded-lg shadow-md">
            <div class="space-y-5 relative">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-10 bg-secondary-green rounded-full"></div>
                    <h2 class="text-3xl font-bold text-gray-800">Misi</h2>
                </div>
                <button
                    class="absolute top-0 right-0 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 hover:text-white text-sm rounded-sm">
                    <i class="fa fa-pencil text-[11px] pr-0.5 text-gray-600 group-hover:text-white"></i>
                    Edit
                </button>
                <ul class="space-y-2 text-base text-gray-600 pl-6">
                    <li class="flex items-start gap-2">
                        <span class="w-2 h-2 mt-2 bg-secondary-green rounded-full"></span>
                        <p>
                            Mengembangkan jaringan perdagangan yang kuat dan
                            berkelanjutan di seluruh Indonesia.
                        </p>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="w-2 h-2 mt-2 bg-secondary-green rounded-full"></span>
                        <p>
                            Memberikan layanan prima dan solusi inovatif kepada seluruh
                            mitra bisnis.
                        </p>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="w-2 h-2 mt-2 bg-secondary-green rounded-full"></span>
                        <p>
                            Membangun sumber daya manusia yang unggul dan profesional.
                        </p>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="w-2 h-2 mt-2 bg-secondary-green rounded-full"></span>
                        <p>Menerapkan praktik bisnis yang etis dan berkelanjutan.</p>
                    </li>
                </ul>
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
            {{-- <form>
                <div class="w-full">
                    <div class="mb-4">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Visi</label>
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300  focus:outline-gray-400"
                            placeholder="Masukkan visi"></textarea>
                    </div>
                </div>
            </form> --}}
            <form wire:submit.prevent='save'>
                <div class="w-full">
                    <div class="mb-3 w-full">
                        <label for="misi" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                            Misi
                            <span class="text-xs text-red-500">
                                *
                            </span>
                        </label>
                        @foreach ($misi as $index => $item)
                            <div class="flex items-center space-x-4 mb-2">
                                <span class="text-sm text-gray-800 dark:text-gray-50 font-medium">
                                    {{ $index + 1 }}.
                                </span>
                                <div class="w-full">
                                    <input wire:model="misi.{{ $index }}" type="text" id="misi"
                                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 font-normal"
                                        placeholder="Masukkan misi {{ $index + 1 }}" />
                                </div>
                                @if (count($misi) > 1)
                                    <button wire:click="removeMisi({{ $index }})" type="button"
                                        wire:loading.remove wire:target='removeMisi({{ $index }})'
                                        class="text-rose-500 hover:text-rose-600">
                                        <i class="fa fa-solid fa-circle-xmark"></i>
                                    </button>
                                    <div role="status" wire:loading wire:target="removeMisi({{ $index }})">
                                        <svg aria-hidden="true"
                                            class="w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-gray-400"
                                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                fill="currentColor" />
                                            <path
                                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                fill="currentFill" />
                                        </svg>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                        <div class="mt-3 flex space-x-2 items-center">
                            <button wire:click='addMisi' type="button"
                                class="px-4 py-2.5 flex items-center space-x-2 text-sm bg-gray-500 hover:bg-gray-600 text-gray-50 rounded-lg">
                                <i class="fa fa-solid fa-circle-plus"></i>
                                <span>Tambah</span>
                            </button>
                            <div role="status" wire:loading wire:target="addMisi">
                                <svg aria-hidden="true"
                                    class="w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-gray-400"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        @error('misi')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
