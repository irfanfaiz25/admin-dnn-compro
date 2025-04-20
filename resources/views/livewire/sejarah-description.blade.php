<div
    class="h-fit w-full p-4 bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            Sejarah
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
        <form wire:submit.prevent="handleSave">
            <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Edit Konten
                </h3>
                <div class="flex space-x-2 justify-end">
                    <button type="button" wire:click='handleCloseForm'
                        class="text-gray-600 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Batal
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
            <div class="p-4 space-y-6">
                <div
                    class="w-full space-y-4 bg-gray-50 dark:bg-[#252525] p-4 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-700 hover:border-secondary-green transition-colors duration-300">
                    <div class="relative group">
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" alt="preview image"
                                class="w-full h-80 object-cover rounded-md shadow-lg transition-transform duration-300 group-hover:scale-[1.02]">
                            <div
                                class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white text-sm font-medium">Preview Image</span>
                            </div>
                        @elseif ($existingImage)
                            <img src="{{ asset($existingImage) }}" alt="preview image"
                                class="w-full h-80 object-cover rounded-md shadow-lg transition-transform duration-300 group-hover:scale-[1.02]">
                            <div
                                class="absolute inset-0 bg-black/40 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white text-sm font-medium">Preview Image</span>
                            </div>
                        @else
                            <div
                                class="w-full h-80 rounded-lg shadow-md bg-gray-200 dark:bg-neutral-700 flex justify-center items-center">
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
                            class="w-full px-4 py-3 text-sm font-medium text-center rounded-lg border-2 border-dashed border-secondary-green bg-white dark:bg-neutral-700 hover:bg-gray-50 dark:hover:bg-neutral-700 transition-colors duration-200 flex items-center justify-center gap-2">
                            <i class="fa fa-cloud-upload text-secondary-green"></i>
                            <span class="text-gray-700 dark:text-gray-300">Pilih Gambar Background</span>
                        </div>
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400 text-center">PNG, JPG or JPEG (MAX. 2MB)
                        </p>
                    </div>
                </div>
                <div class="w-full">
                    <div class="mb-4">
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Judul</label>
                        <input type="text" id="title" wire:model="title"
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Judul">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Deskripsi</label>
                        <div wire:ignore>
                            <input id="description-content" type="hidden" name="description-content"
                                wire:model="description">
                            <div id="editor-container"
                                class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-700 rounded-md">
                                <div id="editor"></div>
                            </div>
                        </div>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Display --}}
    <div class="border border-gray-300 dark:border-gray-700 rounded-md">
        <div class="mb-4 w-full relative">
            <img src="{{ asset($section->image_url) }}" alt="picture" class="w-full h-[400px] object-cover shadow-md">
            <div class="w-full h-full absolute top-0 bg-gradient-to-t from-black/80 to-transparent"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <h1 class="text-2xl md:text-5xl text-gray-50 font-semibold font-display text-center">
                    {{ $section->title }}
                </h1>
            </div>
        </div>

        <div class="ck-content my-4 px-4 py-3 dark:text-gray-300">
            {!! $section->description !!}
        </div>
    </div>

</div>

@push('scripts')
    <script>
        // Global variable to store editor instance
        let editorInstance = null;

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
                    // Store editor instance in global variable
                    editorInstance = editor;

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

        // Move Livewire event listener outside DOMContentLoaded
        // This ensures it's registered regardless of when the DOM is ready
        document.addEventListener('livewire:initialized', () => {
            // console.log('Livewire initialized, setting up event listener');

            Livewire.on('editorContentUpdated', (data) => {
                // console.log('Event received:', data);

                // Use a function to attempt setting the editor data
                const setEditorContent = () => {
                    if (editorInstance) {
                        // console.log('Setting editor data:', data.description);
                        editorInstance.setData(data.description || '');
                        return true;
                    }
                    return false;
                };

                // Try immediately
                if (!setEditorContent()) {
                    // If editor not ready, retry with increasing delays
                    setTimeout(() => {
                        if (!setEditorContent()) {
                            setTimeout(() => {
                                if (!setEditorContent()) {
                                    console.error(
                                        'Editor instance still not available after multiple attempts'
                                    );
                                }
                            }, 500);
                        }
                    }, 100);
                }
            });
        });
    </script>
@endpush
