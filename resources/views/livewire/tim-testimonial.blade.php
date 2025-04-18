<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Testimonial Karyawan
        </h3>
    </div>

    {{-- headline --}}
    <div class="mb-5 flex justify-center">
        <div class="border border-gray-300 min-w-1/2 rounded-md relative">
            @if ($isShowHeadlineForm)
                <form wire:submit.prevent='handleSaveHeadline' class="p-4">
                    <div class="mb-2">
                        <input type="text" id="productHeadlineTitle" wire:model='headlineTitle'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-200 block w-full p-2.5"
                            placeholder="Judul">
                    </div>
                    <div class="mb-2">
                        <textarea id="productHeadlineSubtitle" rows="2" wire:model='headlineSubtitle'
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300  focus:outline-gray-400"
                            placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="mt-1 flex justify-end gap-1">
                        <button type="button" wire:click='handleCloseHeadlineForm'
                            class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                            Batal
                        </button>
                        <button type="submit"
                            class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                            <span>
                                Simpan
                            </span>
                            <span wire:loading wire:target='handleSaveHeadline'
                                class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                            </span>
                        </button>
                    </div>
                </form>
            @else
                <div class="p-8 flex flex-col justify-center items-center text-center">
                    <h1 class="text-4xl font-bold font-display mb-1">
                        {{ $headline->title }}
                    </h1>
                    <div class="w-24 h-1.5 bg-primary-gold mt-5 mb-8 rounded-full"></div>
                    <p class="text-sm font-medium">
                        {{ $headline->subtitle }}
                    </p>
                    <button wire:click='handleOpenHeadlineForm' type="button"
                        class="absolute top-1 right-1 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 hover:text-white text-xs rounded-sm">
                        <i wire:loading.remove wire:target="handleOpenHeadlineForm"
                            class="fa fa-pencil text-[11px] pr-0.5 text-gray-600 group-hover:text-white"></i>
                        <span wire:loading wire:target="handleOpenHeadlineForm"
                            class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                        </span>
                        <span>
                            Edit
                        </span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="flex justify-end mb-4">
        <button type="button" wire:click='handleOpenContentForm'
            class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">
            <span>
                Tambah
            </span>
            <span wire:loading wire:target='handleOpenContentForm'
                class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
            </span>
        </button>
    </div>

    {{-- form --}}
    <div wire:show='isShowContentForm' wire:cloak wire:transition
        class="mb-5 w-full bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
        <form wire:submit.prevent='handleSaveContent'>
            <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300">
                <h3 class="text-lg font-semibold text-gray-600 capitalize">
                    Edit Konten
                </h3>
                <div class="flex space-x-2 justify-end">
                    <button type="button" wire:click='handleCloseContentForm'
                        class="text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Batal
                        </span>
                        <span wire:loading wire:target='handleCloseContentForm'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                    @if ($isEditMode)
                        <button type="button" wire:click='handleDelete'
                            wire:confirm='Apakah anda yakin akan menghapus data ini?'
                            class="text-red-600 bg-red-100 hover:bg-red-200 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                            <span>
                                Hapus
                            </span>
                            <span wire:loading wire:target='handleDelete'
                                class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                            </span>
                        </button>
                    @endif
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Simpan
                        </span>
                        <span wire:loading wire:target='handleSaveContent'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="mb-4 flex justify-between gap-3">
                    <div class="w-2/3">
                        <label for="employeeName" class="block mb-2 text-sm font-medium text-gray-900">
                            Nama <span class="text-sm text-red-500">*</span>
                        </label>
                        <input type="text" id="employeeName" wire:model="employeeName"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan nama karyawan">
                        @error('employeeName')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-1/3">
                        <label for="position" class="block mb-2 text-sm font-medium text-gray-900">
                            Tahun Mulai Bekerja <span class="text-sm text-red-500">*</span>
                        </label>
                        <input type="month" id="position" wire:model="position"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan tahun mulai bekerja">
                        @error('position')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 flex justify-between">
                    <div class="w-1/3">
                        <label class="block mb-2 text-sm font-medium text-gray-900">
                            Foto
                        </label>
                        <div class="flex items-center space-x-4">
                            <div>
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}"
                                        class="w-24 h-24 rounded-full object-cover border-2 border-primary-gold">
                                @else
                                    <div
                                        class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center border-2 border-dashed border-gray-400">
                                        <i class="fas fa-user text-gray-400 text-3xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="text-sm text-gray-500">
                                <p>Upload foto profil</p>
                                <p class="text-xs">Format: JPG, PNG (Max. 2MB)</p>
                                <label for="image-upload"
                                    class="mt-2 inline-block bg-primary-gold text-white px-4 py-2 rounded-md cursor-pointer hover:bg-primary-gold/80 transition-all duration-300">
                                    <i class="fas fa-camera text-sm mr-2"></i>
                                    Upload Foto
                                </label>
                                <input type="file" wire:model="image" id="image-upload" class="hidden"
                                    accept="image/*">
                            </div>
                        </div>
                        @error('image')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-2/3">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">
                            Testimoni <span class="text-sm text-red-500">*</span>
                        </label>
                        <textarea id="message" wire:model="message" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan testimoni"></textarea>
                        @error('message')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- display card --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 relative z-10">
        @foreach ($testimonials as $testimonial)
            <div
                class="bg-white p-6 md:p-8 flex flex-col justify-between rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 group relative">
                <button type="button" wire:click='handleEdit({{ $testimonial->id }})'
                    class="absolute top-6 right-3 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 hover:text-white text-xs rounded-sm inline-flex items-center">
                    <i wire:loading.remove wire:target="handleEdit({{ $testimonial->id }})"
                        class="fa fa-pencil text-[11px] pr-1"></i>
                    <span wire:loading wire:target="handleEdit({{ $testimonial->id }})"
                        class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                    </span>
                    <span>
                        Edit
                    </span>
                </button>

                <!-- Testimonial header -->
                <div>
                    <div class="flex items-start mb-6">
                        <div class="relative">
                            <div
                                class="w-14 h-14 md:w-16 md:h-16 rounded-full overflow-hidden border-2 border-primary-gold hover:scale-110 transition-transform duration-300">
                                @if ($testimonial->image)
                                    <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}"
                                        class="w-full h-full object-cover" />
                                @else
                                    <div
                                        class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-600 font-semibold text-lg">
                                        {{ implode('',array_map(function ($word) {return strtoupper($word[0]);}, explode(' ', $testimonial->name))) }}
                                    </div>
                                @endif
                            </div>
                            <div
                                class="absolute -bottom-2 -right-2 bg-primary-gold text-white p-2 rounded-full hover:rotate-180 transition-transform duration-300">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3
                                class="text-lg font-semibold text-gray-800 group-hover:text-primary-gold transition-colors hover:scale-[1.05]">
                                {{ $testimonial->name }}
                            </h3>
                            <p class="text-sm text-gray-600">
                                Bekerja sejak
                                {{ \Carbon\Carbon::parse($testimonial->position)->locale('id')->isoFormat('MMMM Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- Testimonial message -->
                    <p class="text-gray-700 leading-relaxed text-sm md:text-base">
                        {{ $testimonial->message }}
                    </p>
                </div>

                <!-- Testimonial footer -->
                <div class="mt-6 flex items-center justify-end">
                    <p class="text-xs md:text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($testimonial->created_at)->format('d F Y') }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
