<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Hero Section
        </h3>
        <button wire:click='handleOpenForm' type="button"
            class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
            <span>Edit</span>
            <span wire:loading wire:target='handleOpenForm'
                class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
            </span>
        </button>
    </div>

    {{-- form --}}
    <div wire:show='isShowForm' wire:cloak wire:transition
        class="mb-5 w-full bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
        <form wire:submit.prevent='handleSave'>
            <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300">
                <h3 class="text-lg font-semibold text-gray-600">
                    Edit Konten
                </h3>
                <div class="flex space-x-2 justify-end">
                    <button type="button" wire:click='handleCloseForm'
                        class="text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Batal
                        </span>
                        <span wire:loading wire:target='handleCloseForm'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-4 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
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
                <div class="flex space-x-5">
                    <div
                        class="w-[35%] space-y-4 bg-gray-50 p-4 rounded-lg border-2 border-dashed border-gray-300 hover:border-secondary-green transition-colors duration-300">
                        <div class="relative group">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" alt="preview image"
                                    class="w-full h-60 object-cover rounded-md shadow-lg transition-transform duration-300 group-hover:scale-[1.02]">
                                <div
                                    class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white text-sm font-medium">Preview Image</span>
                                </div>
                            @elseif ($existingImage)
                                <img src="{{ asset($existingImage) }}" alt="preview image"
                                    class="w-full h-60 object-cover rounded-md shadow-lg transition-transform duration-300 group-hover:scale-[1.02]">
                                <div
                                    class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white text-sm font-medium">Preview Image</span>
                                </div>
                            @else
                                <div
                                    class="w-full h-60 rounded-lg shadow-md bg-gray-200 flex justify-center items-center">
                                    <i class="fa fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </div>
                        @error('image')
                            <p class="text-red-500 text-xs my-1">{{ $message }}</p>
                        @enderror
                        <div class="relative">
                            <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                accept="image/*" wire:model="image">
                            <div
                                class="w-full px-4 py-3 text-sm font-medium text-center rounded-lg border-2 border-dashed border-secondary-green bg-white hover:bg-gray-50 transition-colors duration-200 flex items-center justify-center gap-2">
                                <i class="fa fa-cloud-upload text-secondary-green"></i>
                                <span class="text-gray-700">Pilih Gambar Background</span>
                            </div>
                            <p class="mt-2 text-xs text-gray-500 text-center">PNG, JPG or JPEG (MAX. 2MB) <span
                                    class="text-red-500 text-sm">*</span></p>
                        </div>
                    </div>
                    <div class="w-[65%]">
                        <div class="mb-4">
                            <label for="heroTitle" class="block mb-2 text-sm font-medium text-gray-900">
                                Judul
                                <span class="text-red-500 text-sm">*</span>
                            </label>
                            <input type="text" id="heroTitle" wire:model="heroTitle"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                                placeholder="Judul">
                            @error('heroTitle')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="heroDescription" class="block mb-2 text-sm font-medium text-gray-900">
                                Deskripsi
                                <span class="text-red-500 text-sm">*</span>
                            </label>
                            <textarea id="heroDescription" rows="4" wire:model="heroDescription"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300  focus:outline-gray-400"
                                placeholder="Deskripsi"></textarea>
                            @error('heroDescription')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Display --}}
    <div class="w-full min-h-[600px] relative overflow-hidden flex flex-col justify-center">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset($section->image_url) }}" alt="Team Background" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <!-- Content Container -->
        <div class="container mx-auto px-4 md:px-0 lg:px-14 h-full relative z-10 py-20">
            <!-- Text Content -->
            <div class="md:w-1/2 text-left md:pr-8 mb-12 md:mb-0">
                <div class="h-1.5 bg-primary-gold mb-6 rounded-full w-20"></div>
                <h1 class="text-3xl md:text-5xl font-display font-bold text-white mb-3 leading-tight">
                    @php
                        $words = explode(' ', $section->title);
                        $middleIndex = floor(count($words) / 2);
                    @endphp
                    @foreach ($words as $index => $word)
                        @if ($index == $middleIndex)
                            <span class="text-primary-gold">{{ $word }}</span>
                        @else
                            {{ $word }}
                        @endif
                    @endforeach
                </h1>
                <p class="text-base md:text-lg text-gray-200 max-w-xl mb-8">
                    {{ $section->description }}
                </p>
                <button
                    class="px-8 py-3 bg-primary-gold text-gray-900 text-base font-medium rounded-full hover:bg-primary-gold/90 transition-all duration-300 shadow-lg hover:scale-105 active:scale-98">
                    Kenali Kami
                </button>
            </div>
        </div>
    </div>
</div>
