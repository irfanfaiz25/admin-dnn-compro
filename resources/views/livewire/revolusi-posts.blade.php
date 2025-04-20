<div id="paginated-posts"
    class="min-h-screen w-full p-4 bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            Revolusi Terkini
        </h3>
        @if (!$isShowForm)
            <button wire:click='handleOpenForm' type="button"
                class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                <span>Tambah</span>
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
                    @if ($isEditMode)
                        <button type="button" wire:click='handleDelete'
                            wire:confirm='Apakah anda yakin akan menghapus data ini?'
                            class="text-red-600 bg-red-100 dark:bg-red-900 hover:bg-red-200 dark:hover:bg-red-800 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
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
                        <span wire:loading wire:target='handleSave'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="relative mb-7 group">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                        Media
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            ({{ count($mediaFiles) }}/{{ $maxMediaFiles }}
                            files)
                        </span>
                    </label>

                    <div class="w-full mb-4">
                        <label for="media-upload"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-neutral-700 hover:bg-gray-100 dark:hover:bg-neutral-600 transition-all duration-300 relative {{ count($mediaFiles) >= $maxMediaFiles ? 'opacity-50 cursor-not-allowed' : '' }}">
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
                                <svg class="w-8 h-8 mb-3 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-1 text-sm text-gray-500 dark:text-gray-400">
                                    <span class="font-semibold">Click to upload</span>
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    PNG, JPG, JPEG, MP4 (MAX. 5MB)
                                </p>
                            </div>
                            <input id="media-upload" type="file" wire:model="mediaUpload" class="hidden"
                                accept="image/jpeg,image/png,image/jpg,video/mp4"
                                {{ count($mediaFiles) >= $maxMediaFiles ? 'disabled' : '' }} />
                        </label>
                        @error('mediaUpload')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    @if (count($mediaFiles) > 0)
                        <div class="w-full grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                            @foreach ($mediaFiles as $index => $media)
                                <div class="relative group">
                                    @if (is_object($media) && method_exists($media, 'getMimeType') && strpos($media->getMimeType(), 'video') !== false)
                                        <div
                                            class="w-full h-32 bg-gray-800 dark:bg-gray-900 rounded-md flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                    @elseif (is_array($media) && isset($media['type']) && $media['type'] === 'video')
                                        <div
                                            class="w-full h-32 bg-gray-800 dark:bg-gray-900 rounded-md flex items-center justify-center">
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
                                            @if (is_object($media) && method_exists($media, 'temporaryUrl'))
                                                <img src="{{ $media->temporaryUrl() }}" alt="Media preview"
                                                    class="w-full h-full rounded-md object-cover">
                                            @elseif (is_array($media) && isset($media['url']))
                                                <img src="{{ asset($media['url']) }}" alt="Media preview"
                                                    class="w-full h-full rounded-md object-cover">
                                            @elseif (is_object($media) && isset($media->url))
                                                <img src="{{ asset($media->url) }}" alt="Media preview"
                                                    class="w-full h-full rounded-md object-cover">
                                            @endif
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
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 truncate">
                                        @if (is_object($media) && method_exists($media, 'getClientOriginalName'))
                                            {{ $media->getClientOriginalName() }}
                                        @elseif (is_array($media) && isset($media['name']))
                                            {{ $media['name'] }}
                                        @elseif (is_object($media) && isset($media->name))
                                            {{ $media->name }}
                                        @else
                                            Media {{ $index + 1 }}
                                        @endif
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="mb-4 flex gap-3">
                    <div class="w-[20%]">
                        <label for="date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Tanggal</label>
                        <input type="date" id="date" wire:model="date"
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5">
                        @error('date')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="w-[80%]">
                        <label for="postTitle"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                            Judul
                        </label>
                        <input type="text" id="postTitle" wire:model="postTitle"
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan judul postingan">
                        @error('postTitle')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description-content"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Konten</label>
                    <div wire:ignore>
                        <input id="description-content" type="hidden" wire:model="content">
                        <div id="editor-container"
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 rounded-md">
                            <div id="editor"></div>
                        </div>
                    </div>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>
        </form>
    </div>

    {{-- tools bar --}}
    <div class="flex items-center justify-between mb-6">
        <div class="relative flex justify-center items-center min-w-md">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="search" wire:model.live.debounce.300ms="search"
                class="w-full pl-10 pr-4 py-2.5 text-sm text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-[#252525] rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-primary-gold/50"
                placeholder="Pencarian ...">
            <div wire:loading wire:target='search'
                class="animate-spin rounded-full h-6 w-6 border-[3px] border-primary-gold border-t-transparent ml-2">
            </div>
        </div>

        <div class="flex items-center space-x-3">
            <!-- Per Page Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center space-x-2 px-3 py-2.5 bg-white dark:bg-[#252525] border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <span>{{ $perPage }} Items</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 mt-1 w-48 bg-white dark:bg-[#252525] border border-gray-300 dark:border-gray-700 rounded-md shadow-lg z-10">
                    <div class="py-1">
                        @foreach ([10, 20, 50, 100] as $value)
                            <button wire:click="setPerPage({{ $value }})"
                                class="w-full px-4 py-2 text-sm text-left text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex justify-between items-center">
                                <span>{{ $value }} Items</span>
                                @if ($perPage === $value)
                                    <i class="fas fa-check text-xs text-primary-gold"></i>
                                @endif
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sort Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center space-x-2 px-3 py-2.5 bg-white dark:bg-[#252525] border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <span>Urutkan</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 mt-1 w-48 bg-white dark:bg-[#252525] border border-gray-300 dark:border-gray-700 rounded-md shadow-lg z-10">
                    <div class="py-1">
                        <button wire:click="sortBy('date')"
                            class="w-full px-4 py-2 text-sm text-left text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex justify-between items-center">
                            <span>Tanggal</span>
                            @if ($sortField === 'date')
                                <i
                                    class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} text-xs text-gray-500"></i>
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Display posts --}}
    <div class="grid grid-cols-3 gap-3">
        @foreach ($posts as $post)
            <div
                class="w-full bg-white dark:bg-neutral-700 flex flex-col p-5 rounded-xl shadow-lg h-[500px] border dark:border-gray-700">
                <div class="relative">
                    @if (isset($post->media) && count($post->media) > 0)
                        @if ($post->media[0]->type === 'video')
                            <div class="w-full h-52 relative rounded-md shadow-lg group">
                                <button type="button" wire:click="handleEdit({{ $post->id }})"
                                    class="absolute top-1 right-1 z-10 px-3 py-1.5 group bg-white/80 dark:bg-[#252525]/80 hover:bg-white dark:hover:bg-[#252525] border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 text-xs rounded-sm backdrop-blur-sm transition-colors duration-200 inline-flex items-center space-x-1">
                                    <i wire:loading.remove wire:target="handleEdit({{ $post->id }})"
                                        class="fa fa-pencil text-[11px] text-secondary-green group-hover:text-secondary-green"></i>
                                    <span wire:loading wire:target="handleEdit({{ $post->id }})"
                                        class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                                    </span>
                                    <span>
                                        Edit
                                    </span>
                                </button>
                                <div class="w-full h-full bg-gray-700 rounded-md flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400 group-hover:text-primary-gold transition-colors duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="absolute bottom-2 left-2 bg-black/70 text-white px-2 py-1 rounded text-xs">
                                    <svg class="w-3 h-3 inline-block mr-1" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 5v14l11-7z"></path>
                                    </svg>
                                    Video
                                </div>
                            </div>
                        @else
                            <button type="button" wire:click="handleEdit({{ $post->id }})"
                                class="absolute top-1 right-1 px-3 py-1.5 group bg-white/80 dark:bg-[#252525]/80 hover:bg-white dark:hover:bg-[#252525] border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 text-xs rounded-sm backdrop-blur-sm transition-colors duration-200 inline-flex items-center space-x-1">
                                <i wire:loading.remove wire:target="handleEdit({{ $post->id }})"
                                    class="fa fa-pencil text-[11px] text-secondary-green group-hover:text-secondary-green"></i>
                                <span wire:loading wire:target="handleEdit({{ $post->id }})"
                                    class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                                </span>
                                <span>
                                    Edit
                                </span>
                            </button>
                            <img src="{{ asset($post->media[0]->url) }}" alt="Post thumbnail"
                                class="w-full h-52 object-cover rounded-md shadow-lg duration-300">
                        @endif
                    @else
                        <button type="button" wire:click="handleEdit({{ $post->id }})"
                            class="absolute top-1 right-1 px-3 py-1.5 group bg-white/80 dark:bg-[#252525]/80 hover:bg-white dark:hover:bg-[#252525] border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 text-xs rounded-sm backdrop-blur-sm transition-colors duration-200 inline-flex items-center space-x-1">
                            <i wire:loading.remove wire:target="handleEdit({{ $post->id }})"
                                class="fa fa-pencil text-[11px] text-secondary-green group-hover:text-secondary-green"></i>
                            <span wire:loading wire:target="handleEdit({{ $post->id }})"
                                class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                            </span>
                            <span>
                                Edit
                            </span>
                        </button>
                        <div
                            class="w-full h-52 bg-gray-100 dark:bg-gray-700 rounded-md shadow-lg flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">No media available</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="flex-1">
                    <p class="mt-3 mb-1 text-sm text-gray-500 dark:text-gray-400 font-light">
                        {{ \Carbon\Carbon::parse($post->date)->format('F, d Y') }}
                    </p>
                    <h3 class="mb-2 text-xl text-gray-800 dark:text-gray-200 font-bold font-display">
                        {{ $post->title }}
                    </h3>
                    <p class="mb-4 text-base font-normal text-gray-600 dark:text-gray-400">
                        {{ Str::limit(strip_tags($post->content), 250) }}
                    </p>
                </div>
                <div class="flex w-full justify-start mt-auto">
                    <button type="button" wire:click='handleOpenModal({{ $post->id }})'
                        class="text-base text-gray-500 dark:text-gray-400 font-semibold hover:text-primary-gold transition-colors duration-300 flex items-center gap-2">
                        <span>
                            Lihat Detail
                        </span>
                        <i wire:loading.remove wire:target="handleOpenModal({{ $post->id }})"
                            class="fa fa-chevron-right text-xs"></i>
                        <span wire:loading wire:target="handleOpenModal({{ $post->id }})"
                            class="animate-spin rounded-full h-4 w-4 border-[2px] border-primary-gold border-t-transparent">
                        </span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-5">
        {{ $posts->links(data: ['scrollTo' => '#paginated-posts']) }}
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
                class="inline-block align-middle bg-white dark:bg-[#252525] border dark:border-gray-700 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:w-full">
                <!-- Modal Header -->
                <div class="bg-white dark:bg-[#252525] px-6 pt-6 pb-4 relative">
                    <button type="button" wire:click='closeModal'
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                        <i wire:loading.remove wire:target="closeModal" class="fa-solid fa-xmark text-lg"></i>
                        <span wire:loading wire:target="closeModal"
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent">
                        </span>
                    </button>
                    <h3 class="text-lg font-semibold leading-6 text-gray-900 dark:text-gray-100">
                        Detail Post
                    </h3>
                </div>

                <!-- Modal Body -->
                <div class="p-6">
                    @if ($selectedPost)
                        <div class="w-full h-full bg-white dark:bg-[#252525] rounded-xl">
                            <!-- Media Display -->
                            <div class="flex flex-col md:flex-row md:space-x-2 xl:space-x-3">
                                <!-- Main Media Display -->
                                <div class="w-full md:w-[85%] h-[300px] md:h-[500px] mb-3 md:mb-0">
                                    @if (isset($selectedPost->media[$selectedMediaIndex]))
                                        @if ($selectedPost->media[$selectedMediaIndex]->type === 'video')
                                            <video src="{{ $selectedPost->media[$selectedMediaIndex]->url }}" controls
                                                class="w-full h-full rounded-lg object-cover shadow-xl"></video>
                                        @else
                                            <img src="{{ $selectedPost->media[$selectedMediaIndex]->url }}"
                                                alt="{{ $selectedPost->title }}"
                                                class="w-full h-full rounded-lg object-cover shadow-xl">
                                        @endif
                                    @else
                                        <div
                                            class="w-full h-full rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                            <p class="text-gray-500 dark:text-gray-400">No media available</p>
                                        </div>
                                    @endif
                                </div>

                                <!-- Thumbnails -->
                                @if (isset($selectedPost->media) && count($selectedPost->media) > 0)
                                    <div
                                        class="w-full md:w-[15%] h-24 md:h-[500px] flex md:flex-col space-x-2 md:space-x-0 md:space-y-2 overflow-x-auto md:overflow-y-auto">
                                        @foreach ($selectedPost->media as $index => $media)
                                            <div class="relative min-w-[100px] xl:min-w-full h-[70px] xl:h-32 cursor-pointer transition-all duration-200 
                                            {{ $selectedMediaIndex === $index ? 'border-[3px] border-primary-gold rounded-xl' : 'opacity-70 hover:opacity-100' }}"
                                                wire:click="setSelectedMedia({{ $index }})">
                                                <span wire:loading wire:target='setSelectedMedia({{ $index }})'
                                                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-spin rounded-full h-6 w-6 border-[3px] border-white/80 border-t-transparent shadow-md">
                                                </span>
                                                @if ($media->type === 'video')
                                                    <div class="w-full h-full relative">
                                                        <div
                                                            class="w-full h-full bg-gray-700 rounded-md flex items-center justify-center">
                                                            <svg class="w-8 h-8 text-gray-400 group-hover:text-primary-gold transition-colors duration-300"
                                                                fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                                                </path>
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                        </div>
                                                        <div
                                                            class="absolute bottom-1 left-1 bg-black/70 text-white px-2 py-0.5 rounded text-[10px]">
                                                            <svg class="w-2 h-2 inline-block mr-1" fill="currentColor"
                                                                viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8 5v14l11-7z"></path>
                                                            </svg>
                                                            Video
                                                        </div>
                                                    </div>
                                                @else
                                                    <img src="{{ $media->url }}"
                                                        alt="Thumbnail {{ $media->id }}"
                                                        class="w-full h-full object-cover rounded-lg shadow-lg">
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- Post Content -->
                            <div class="mt-2 md:mt-3 xl:mt-5 mb-6 space-y-4">
                                <p class="text-sm md:text-base text-gray-500 dark:text-gray-400 font-light">
                                    {{ \Carbon\Carbon::parse($selectedPost->date)->format('F, d Y') }}
                                </p>
                                <h1
                                    class="mb-8 text-xl md:text-4xl text-gray-800 dark:text-gray-100 font-bold font-display text-center">
                                    {{ $selectedPost->title }}
                                </h1>
                                <div class="space-y-4 ck-content dark:text-gray-300">
                                    {!! $selectedPost->content !!}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center justify-center h-64">
                            <p class="text-gray-500 dark:text-gray-400">Loading post details...</p>
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
                        editorInstance.setData(data.content || '');
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
