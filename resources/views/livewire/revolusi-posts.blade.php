<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Revolusi Terkini
        </h3>
        <button type="button"
            class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">Tambah</button>
    </div>

    <div class="grid grid-cols-3 gap-3">
        @for ($i = 0; $i < 3; $i++)
            <div
                class="w-full bg-white flex flex-col p-5 rounded-xl shadow-lg hover:scale-[1.02] transition-transform duration-300">
                <img src="/img/picture1.jpg" alt="picture"
                    class="w-full h-52 object-cover rounded-md shadow-lg hover:scale-[1.05] transition-transform duration-300">
                <p class="mt-3 mb-1 text-sm text-gray-500 font-light">
                    {{-- {{ $post['date'] }} --}}
                    Januari 23, 2025
                </p>
                <h3 class="mb-2 text-xl text-gray-800 font-bold font-display">
                    {{-- {{ $post['title'] }} --}}
                    Ini Judul
                </h3>
                <p class="mb-4 text-base font-normal text-gray-600">
                    {{-- {{ Str::limit($post['description'], 290) }} --}}
                    Dengan bangga kami memperkenalkan Kedathon Nusantara, sebuah produk rokok premium yang menggabungkan
                    cita rasa tembakau pilihan dari berbagai penjuru Nusantara. Diproduksi dengan standar kualitas
                    tinggi
                    dan menggunakan teknologi modern, Kedathon Nusantara hadir untuk memberikan pengalaman ...
                </p>
                <div class="flex w-full justify-start">
                    <button type="button" wire:click='handleOpenModal'
                        class="text-base text-gray-500 font-semibold hover:text-primary-gold transition-colors duration-300 flex items-center gap-2">
                        Baca Selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        @endfor
    </div>

    <div class="mt-5 w-full bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
        <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300">
            <h3 class="text-lg font-semibold text-gray-600">
                Form
            </h3>
            <div class="flex space-x-2 justify-end">
                <button type="button"
                    class="text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">Batal</button>
                <button type="submit"
                    class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">Simpan</button>
            </div>
        </div>
        <div class="p-4">
            <form wire:submit.prevent='save'>
                <div class="relative mb-7 group">
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                        Media
                        <span class="text-xs text-gray-500">
                            ({{ count($mediaFiles) }}/{{ $maxMediaFiles }}
                            files)
                        </span>
                    </label>

                    <div class="w-full mb-4">
                        <label for="media-upload"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all duration-300 relative {{ count($mediaFiles) >= $maxMediaFiles ? 'opacity-50 cursor-not-allowed' : '' }}">
                            <div wire:loading wire:target='mediaUpload'
                                class="absolute top-0 w-full h-full bg-black/50 flex justify-center items-center rounded-md">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <!-- Spinning circle loader -->
                                    <div
                                        class="animate-spin rounded-full h-6 w-6 border-[3px] border-primary-gold border-t-transparent">
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-1 text-sm text-gray-500">
                                    <span class="font-semibold">Click to upload</span>
                                </p>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, JPEG, MP4 (MAX. 5MB)
                                </p>
                            </div>
                            <input id="media-upload" type="file" wire:model="mediaUpload" class="hidden"
                                accept="image/jpeg,image/png,image/jpg,video/mp4"
                                {{ count($mediaFiles) >= $maxMediaFiles ? 'disabled' : '' }} />
                        </label>
                        @error('mediaUpload')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    @if (count($mediaFiles) > 0)
                        <div class="w-full grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                            @foreach ($mediaFiles as $index => $media)
                                <div class="relative group">
                                    @if (strpos($media->getMimeType(), 'video') !== false)
                                        <div
                                            class="w-full h-32 bg-gray-800 rounded-md flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                    @else
                                        <div class="w-full h-32 relative">
                                            <img src="{{ $media->temporaryUrl() }}" alt="Media preview"
                                                class="w-full h-full rounded-md object-cover">
                                            <div wire:loading wire:target='removeMedia({{ $index }})'
                                                class="absolute top-0 w-full h-full bg-black/50 flex justify-center items-center rounded-md">
                                                <div class="absolute inset-0 flex items-center justify-center">
                                                    <!-- Spinning circle loader -->
                                                    <div
                                                        class="animate-spin rounded-full h-6 w-6 border-[3px] border-primary-gold border-t-transparent">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <button type="button" wire:click="removeMedia({{ $index }})"
                                        class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                    <p class="text-xs text-gray-500 mt-1 truncate">
                                        {{ $media->getClientOriginalName() }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="mb-4 flex gap-3">
                    <div class="w-[20%]">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                        <input type="date" id="date" name="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5">
                    </div>
                    <div class="w-[80%]">
                        <label for="postTitle" class="block mb-2 text-sm font-medium text-gray-900">
                            Judul
                        </label>
                        <input type="text" id="postTitle" name="postTitle"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan judul postingan">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description-content"
                        class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                    <div wire:ignore>
                        <input id="description-content" type="hidden" name="description-content"
                            wire:model="description">
                        <div id="editor-container" class="bg-gray-50 border border-gray-300 rounded-md">
                            <div id="editor"></div>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-2 justify-end mt-4">
                    <button type="button"
                        class="text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">Batal</button>
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- modal post detail --}}
    <div x-show="$wire.showModal" x-transition.opacity class="fixed inset-0 z-50 overflow-y-auto"
        style="display: none;">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/60 rounded-md" aria-hidden="true" wire:click='closeModal'></div>

        <!-- Modal Container -->
        <div class="relative flex min-h-screen items-center justify-center px-4 pt-4 pb-20 text-center">
            <!-- Modal Content -->

            <div x-show="$wire.showModal" x-transition.scale.origin.center
                class="inline-block align-middle bg-white dark:bg-bg-dark-primary rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:w-full">
                <!-- Modal Header -->
                <div class="bg-white dark:bg-bg-dark-primary px-6 pt-6 pb-4 relative">
                    <button type="button" wire:click='closeModal'
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-500">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                    <h3 class="text-lg font-semibold leading-6 text-gray-900 dark:text-text-dark-primary">
                        Detail Post
                    </h3>
                </div>

                <!-- Modal Body -->
                <div class="p-6">
                    @if ($selectedPost)
                        <div class="w-full h-full bg-white rounded-xl">
                            <!-- Media Display -->
                            <div class="flex flex-col md:flex-row md:space-x-2 xl:space-x-3">
                                <!-- Main Media Display -->
                                <div class="w-full md:w-[85%] h-[300px] md:h-[500px] mb-3 md:mb-0">
                                    @if (isset($selectedPost['media'][$selectedMediaIndex]))
                                        @if ($selectedPost['media'][$selectedMediaIndex]['type'] === 'video')
                                            <video src="{{ $selectedPost['media'][$selectedMediaIndex]['url'] }}"
                                                controls
                                                class="w-full h-full rounded-lg object-cover shadow-xl"></video>
                                        @else
                                            <img src="{{ $selectedPost['media'][$selectedMediaIndex]['url'] }}"
                                                alt="{{ $selectedPost['title'] }}"
                                                class="w-full h-full rounded-lg object-cover shadow-xl">
                                        @endif
                                    @else
                                        <div
                                            class="w-full h-full rounded-lg bg-gray-100 flex items-center justify-center">
                                            <p class="text-gray-500">No media available</p>
                                        </div>
                                    @endif
                                </div>

                                <!-- Thumbnails -->
                                @if (isset($selectedPost['media']) && count($selectedPost['media']) > 0)
                                    <div
                                        class="w-full md:w-[15%] h-24 md:h-[500px] flex md:flex-col space-x-2 md:space-x-0 md:space-y-2 overflow-x-auto md:overflow-y-auto">
                                        @foreach ($selectedPost['media'] as $index => $media)
                                            <div class="relative min-w-[100px] xl:min-w-full h-[70px] xl:h-32 cursor-pointer transition-all duration-200 
                                            {{ $selectedMediaIndex === $index ? 'border-[3px] border-primary-gold rounded-xl' : 'opacity-70 hover:opacity-100' }}"
                                                wire:click="setSelectedMedia({{ $index }})">
                                                @if ($media['type'] === 'video')
                                                    <div class="w-full h-full relative">
                                                        <img src="{{ $media['url'] }}" {{-- In a real app, this would be a thumbnail --}}
                                                            alt="Video thumbnail"
                                                            class="w-full h-full object-cover rounded-lg">
                                                        <div
                                                            class="absolute inset-0 bg-black/30 flex items-center justify-center rounded-lg">
                                                            <div
                                                                class="w-6 h-6 flex justify-center items-center bg-gray-50 hover:bg-gray-100 rounded-full">
                                                                <svg class="w-3 h-3" fill="currentColor"
                                                                    viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8 5v14l11-7z"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <img src="{{ $media['url'] }}"
                                                        alt="Thumbnail {{ $media['id'] }}"
                                                        class="w-full h-full object-cover rounded-lg shadow-lg">
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- Post Content -->
                            <div class="mt-2 md:mt-3 xl:mt-5 mb-6 space-y-4">
                                <p class="text-sm md:text-base text-gray-500 font-light">
                                    {{ $selectedPost['date'] }}
                                </p>
                                <h1 class="mb-8 text-xl md:text-4xl text-gray-800 font-bold font-display text-center">
                                    {{ $selectedPost['title'] }}
                                </h1>
                                <div class="text-gray-600 text-sm md:text-lg font-light space-y-4">
                                    @foreach (explode("\n", $selectedPost['description']) as $paragraph)
                                        <p class="indent-10">{{ $paragraph }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center justify-center h-64">
                            <p class="text-gray-500">Loading post details...</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: {
                        items: [
                            'undo', 'redo', '|',
                            'heading', '|',
                            'bold', 'italic', '|',
                            'numberedList', 'bulletedList'
                        ]
                    },
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            },
                            {
                                model: 'heading3',
                                view: 'h3',
                                title: 'Heading 3',
                                class: 'ck-heading_heading3'
                            }
                        ]
                    }
                })
                .then(editor => {
                    // Store editor instance
                    window.editor = editor;

                    // Set initial data if available
                    const descriptionInput = document.querySelector('#description-content');
                    if (descriptionInput.value) {
                        editor.setData(descriptionInput.value);
                    }

                    // Update hidden input when editor content changes
                    editor.model.document.on('change:data', () => {
                        const data = editor.getData();
                        descriptionInput.value = data;

                        // Dispatch input event to trigger Livewire update
                        descriptionInput.dispatchEvent(new Event('input'));
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
