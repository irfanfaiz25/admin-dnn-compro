<div
    class="h-fit w-full bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
    <form wire:submit.prevent='handleSave' class="px-6 py-4">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
                Form
            </h3>
            <div class="flex space-x-2 justify-end">
                <button type="button" wire:click='handleResetForm'
                    class="text-gray-600 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                    <span>
                        Batal
                    </span>
                    <span wire:loading wire:target='handleResetForm'
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

        <div class="mt-4 flex justify-center">
            <div
                class="flex flex-col items-center gap-4 p-6 border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-lg hover:border-gray-400 dark:hover:border-gray-600 transition-colors duration-300">
                @if ($companyLogo)
                    <div class="relative group">
                        <img src="{{ $companyLogo->temporaryUrl() }}" alt="companyLogo"
                            class="h-24 w-auto object-contain rounded-md group-hover:scale-105 transition-transform duration-300">
                    </div>
                @elseif ($existingCompanyLogo)
                    <div class="relative group">
                        <img src="{{ asset($existingCompanyLogo) }}" alt="companyLogo"
                            class="h-24 w-auto object-contain rounded-md group-hover:scale-105 transition-transform duration-300">
                    </div>
                @else
                    <div
                        class="h-24 w-24 rounded-full bg-gray-200 dark:bg-gray-700 shadow-md flex justify-center items-center">
                        <i class="fa fa-camera text-lg text-gray-400"></i>
                    </div>
                @endif
                <div class="w-full">
                    <label for="logo"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 hover:text-gray-600 dark:hover:text-gray-400 transition-colors duration-300">
                        Logo
                    </label>
                    <input type="file" id="logo" accept="image/*" wire:model='companyLogo'
                        class="block w-full px-4 py-3 text-sm text-gray-900 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer focus:outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-gray-50 dark:file:bg-gray-600 file:text-gray-700 dark:file:text-gray-300 hover:file:bg-gray-100 dark:hover:file:bg-gray-500"
                        placeholder="Choose logo file">
                    @error('companyLogo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="companyName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Nama Perusahaan
                    </label>
                    <input type="text" id="companyName" wire:model='companyName'
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-300 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                        placeholder="Masukkan nama perusahaan">
                    @error('companyName')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-300 mb-6 flex items-center">
                <span class="bg-gray-500 w-2 h-8 rounded mr-3"></span>
                Kontak
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="group">
                    <div
                        class="flex items-center bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg transition-all duration-300 group-hover:bg-blue-100 dark:group-hover:bg-blue-900/30">
                        <div
                            class="w-12 h-12 flex items-center justify-center bg-blue-500 rounded-full mr-4 group-hover:bg-blue-600">
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 8L17.4392 9.97822C15.454 11.0811 14.4614 11.6326 13.4102 11.8488C12.4798 12.0401 11.5202 12.0401 10.5898 11.8488C9.53864 11.6326 8.54603 11.0811 6.5608 9.97822L3 8M6.2 19H17.8C18.9201 19 19.4802 19 19.908 18.782C20.2843 18.5903 20.5903 18.2843 20.782 17.908C21 17.4802 21 16.9201 21 15.8V8.2C21 7.0799 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V15.8C3 16.9201 3 17.4802 3.21799 17.908C3.40973 18.2843 3.71569 18.5903 4.09202 18.782C4.51984 19 5.07989 19 6.2 19Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <label for="email"
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Email
                                Address</label>
                            <input type="email" id="email" placeholder="Masukkan email" wire:model='email'
                                class="w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm outline-none transition-all duration-300">
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Format: example@domain.com</p>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="group">
                    <div
                        class="flex items-center bg-indigo-50 dark:bg-indigo-900/20 p-4 rounded-lg transition-all duration-300 group-hover:bg-indigo-100 dark:group-hover:bg-indigo-900/30">
                        <div
                            class="w-12 h-12 flex items-center justify-center bg-indigo-500 rounded-full mr-4 group-hover:bg-indigo-600">
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 5.5C3 14.0604 9.93959 21 18.5 21C18.8862 21 19.2691 20.9859 19.6483 20.9581C20.0834 20.9262 20.3009 20.9103 20.499 20.7963C20.663 20.7019 20.8185 20.5345 20.9007 20.364C21 20.1582 21 19.9181 21 19.438V16.6207C21 16.2169 21 16.015 20.9335 15.842C20.8749 15.6891 20.7795 15.553 20.6559 15.4456C20.516 15.324 20.3262 15.255 19.9468 15.117L16.74 13.9509C16.2985 13.7904 16.0777 13.7101 15.8683 13.7237C15.6836 13.7357 15.5059 13.7988 15.3549 13.9058C15.1837 14.0271 15.0629 14.2285 14.8212 14.6314L14 16C11.3501 14.7999 9.2019 12.6489 8 10L9.36863 9.17882C9.77145 8.93713 9.97286 8.81628 10.0942 8.64506"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <label for="phone"
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Phone
                                Number</label>
                            <input type="tel" id="phone" placeholder="Masukkan nomor telepon (gunakan +62)"
                                wire:model='phone'
                                class="w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm outline-none transition-all duration-300">
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Format: +628xxxxxxxxxx</p>
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="group">
                    <div
                        class="flex items-center bg-green-50 dark:bg-green-900/20 p-4 rounded-lg transition-all duration-300 group-hover:bg-green-100 dark:group-hover:bg-green-900/30">
                        <div
                            class="w-12 h-12 flex items-center justify-center bg-green-500 rounded-full mr-4 group-hover:bg-green-600">
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 1.5C6.20103 1.5 1.50002 6.20101 1.50002 12C1.50002 13.8381 1.97316 15.5683 2.80465 17.0727L1.08047 21.107C0.928048 21.4637 0.99561 21.8763 1.25382 22.1657C1.51203 22.4552 1.91432 22.5692 2.28599 22.4582L6.78541 21.1155C8.32245 21.9965 10.1037 22.5 12 22.5C17.799 22.5 22.5 17.799 22.5 12C22.5 6.20101 17.799 1.5 12 1.5Z"
                                    fill="white"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <label for="whatsapp"
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">WhatsApp</label>
                            <input type="tel" id="whatsapp" placeholder="Masukkan nomor whatsapp (gunakan +62)"
                                wire:model='whatsapp'
                                class="w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm outline-none transition-all duration-300">
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Format: +628xxxxxxxxxx</p>
                            @error('whatsapp')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-300 mb-6 flex items-center">
                <span class="bg-gray-500 w-2 h-8 rounded mr-3"></span>
                Social Media
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="group">
                    <div
                        class="flex items-center bg-pink-50 dark:bg-pink-900/20 p-4 rounded-lg transition-all duration-300 group-hover:bg-pink-100 dark:group-hover:bg-pink-900/30">
                        <div
                            class="w-12 h-12 flex items-center justify-center bg-pink-500 rounded-full mr-4 group-hover:bg-pink-600">
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M3 16V8C3 5.23858 5.23858 3 8 3H16C18.7614 3 21 5.23858 21 8V16C21 18.7614 18.7614 21 16 21H8C5.23858 21 3 18.7614 3 16Z"
                                    stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <label for="instagram"
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Instagram</label>
                            <input type="text" id="instagram" wire:model='instagram'
                                placeholder="Masukkan username Instagram"
                                class="w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent text-sm outline-none transition-all duration-300">
                            @error('instagram')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="group">
                    <div
                        class="flex items-center bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg transition-all duration-300 group-hover:bg-blue-100 dark:group-hover:bg-blue-900/30">
                        <div
                            class="w-12 h-12 flex items-center justify-center bg-blue-600 rounded-full mr-4 group-hover:bg-blue-700">
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18 2H15C13.6739 2 12.4021 2.52678 11.4645 3.46447C10.5268 4.40215 10 5.67392 10 7V10H7V14H10V22H14V14H17L18 10H14V7C14 6.73478 14.1054 6.48043 14.2929 6.29289C14.4804 6.10536 14.7348 6 15 6H18V2Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <label for="facebook"
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Facebook</label>
                            <input type="text" id="facebook" wire:model='facebook'
                                placeholder="Masukkan username Facebook"
                                class="w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm outline-none transition-all duration-300">
                            @error('facebook')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="group">
                    <div
                        class="flex items-center bg-sky-50 dark:bg-sky-900/20 p-4 rounded-lg transition-all duration-300 group-hover:bg-sky-100 dark:group-hover:bg-sky-900/30">
                        <div
                            class="w-12 h-12 flex items-center justify-center bg-sky-500 rounded-full mr-4 group-hover:bg-sky-600">
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22 4C22 4 21.3 6.1 20 7.4C21.6 17.4 10.6 24.7 2 19C4.2 19.1 6.4 18.4 8 17C3 15.5 0.5 9.6 3 5C5.2 7.6 8.6 9.1 12 9C11.1 4.8 16 2.4 19 5.2C20.1 5.2 22 4 22 4Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <label for="twitter"
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Twitter</label>
                            <input type="text" id="twitter" wire:model='twitter'
                                placeholder="Masukkan username Twitter"
                                class="w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent text-sm outline-none transition-all duration-300">
                            @error('twitter')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="group">
                    <div
                        class="flex items-center bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg transition-all duration-300 group-hover:bg-blue-100 dark:group-hover:bg-blue-900/30">
                        <div
                            class="w-12 h-12 flex items-center justify-center bg-blue-500 rounded-full mr-4 group-hover:bg-blue-600">
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16 8C17.5913 8 19.1174 8.63214 20.2426 9.75736C21.3679 10.8826 22 12.4087 22 14V21H18V14C18 13.4696 17.7893 12.9609 17.4142 12.5858C17.0391 12.2107 16.5304 12 16 12C15.4696 12 14.9609 12.2107 14.5858 12.5858C14.2107 12.9609 14 13.4696 14 14V21H10V14C10 12.4087 10.6321 10.8826 11.7574 9.75736C12.8826 8.63214 14.4087 8 16 8Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6 9H2V21H6V9Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M4 6C5.10457 6 6 5.10457 6 4C6 2.89543 5.10457 2 4 2C2.89543 2 2 2.89543 2 4C2 5.10457 2.89543 6 4 6Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <label for="linkedin"
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">LinkedIn</label>
                            <input type="text" id="linkedin" wire:model='linkedin'
                                placeholder="Masukkan username LinkedIn"
                                class="w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm outline-none transition-all duration-300">
                            @error('linkedin')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
