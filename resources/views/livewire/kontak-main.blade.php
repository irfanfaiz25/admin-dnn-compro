<div
    class="h-fit w-full p-4 bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            Kontak
        </h3>
        @if (!$isShowForm)
            <button wire:click='handleOpenForm' type="button"
                class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                <span>Edit</span>
                <span wire:loading wire:target='handleOpenForm'
                    class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                </span>
            </button>
        @endif
    </div>

    {{-- form --}}
    <div wire:show='isShowForm' wire:cloak wire:transition
        class="mb-5 w-full bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
        <form wire:submit.prevent='handleSave'>
            <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 capitalize">
                    Edit Konten
                </h3>
                <div class="flex space-x-2 justify-end">
                    <button type="button" wire:click='handleCloseForm'
                        class="text-gray-600 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Batal
                        </span>
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
                <!-- Address Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Alamat
                            Lengkap</label>
                        <textarea wire:model="address" id="address" rows="3"
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
                    <div>
                        <label for="operationalHours"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Jam
                            Operasional</label>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <input type="text" wire:model="weekdayOpen" id="weekdayOpen"
                                    class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                                    placeholder="Senin - Jumat: 08.00 - 16.00">
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="text" wire:model="weekendOpen" id="weekendOpen"
                                    class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                                    placeholder="Sabtu: 08.00 - 12.00">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Nomor
                            Telepon</label>
                        <input type="tel" wire:model="phone" id="phone"
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="+6298-3539-040">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Format: Gunakan +62 di awal nomor
                            (bukan 0)</p>
                    </div>
                    <div>
                        <label for="whatsapp"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Nomor
                            WhatsApp</label>
                        <input type="tel" wire:model="whatsapp" id="whatsapp"
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="+62851-1722-5313">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Format: Gunakan +62 di awal nomor
                            (bukan 0)</p>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Alamat
                        Email</label>
                    <input type="email" wire:model="email" id="email"
                        class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                        placeholder="info@dwipanusantaraniaga.id">
                </div>
            </div>
        </form>
    </div>

    {{-- Display --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
        <!-- Location Card -->
        <div
            class="bg-white dark:bg-neutral-700 rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow hover:scale-[1.02]">
            <div class="flex justify-center mb-4">
                <div
                    class="p-3 bg-red-50 dark:bg-red-900/20 rounded-full hover:rotate-360 transition-transform duration-500">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">Kunjungi Kami</h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm">
                {{ $contact->address }}
            </p>
        </div>

        <!-- Phone Card -->
        <div
            class="bg-white dark:bg-neutral-700 rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow hover:scale-[1.02]">
            <div class="flex justify-center mb-4">
                <div
                    class="p-3 bg-red-50 dark:bg-red-900/20 rounded-full hover:rotate-360 transition-transform duration-500">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                </div>
            </div>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">Hubungi Kami</h3>
            <a href="tel:{{ $contact->phone }}" class="text-gray-600 dark:text-gray-400 text-sm hover:text-red-500">
                {{ $contact->phone }}
            </a>
            <a href="https://wa.me/{{ $contact->whatsapp }}"
                class="text-gray-600 dark:text-gray-400 text-sm hover:text-red-500 mt-2 flex items-center justify-center gap-2"
                target="_blank" rel="noopener noreferrer">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                </svg>
                <span>
                    {{ $contact->whatsapp }}
                </span>
            </a>
        </div>

        <!-- Email Card -->
        <div
            class="bg-white dark:bg-neutral-700 rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow hover:scale-[1.02]">
            <div class="flex justify-center mb-4">
                <div
                    class="p-3 bg-red-50 dark:bg-red-900/20 rounded-full hover:rotate-360 transition-transform duration-500">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">Alamat Email</h3>
            <a href="mailto:{{ $contact->email }}"
                class="text-gray-600 dark:text-gray-400 text-sm hover:text-red-500">
                {{ $contact->email }}
            </a>
        </div>

        <!-- Hours Card -->
        <div
            class="bg-white dark:bg-neutral-700 rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow hover:scale-[1.02]">
            <div class="flex justify-center mb-4">
                <div
                    class="p-3 bg-red-50 dark:bg-red-900/20 rounded-full hover:rotate-360 transition-transform duration-500">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">
                Jam Operasional
            </h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm">
                {{ $contact->weekday_open }}<br>
                {{ $contact->weekend_open }}
            </p>
        </div>
    </div>
</div>
