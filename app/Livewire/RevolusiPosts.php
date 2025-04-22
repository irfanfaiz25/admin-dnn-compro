<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class RevolusiPosts extends Component
{
    use WithFileUploads, WithPagination;

    public $search = '';
    public $sortField = 'date';
    public $sortDirection = 'desc';
    public $perPage = 10;

    public $isShowForm = false;
    public $date;
    public $postTitle;
    public $content;

    public $isEditMode = false;
    public $postId;

    public $mediaFiles = [];
    public $mediaUpload;
    public $maxMediaFiles = 5;

    public $showModal = false;
    public $selectedPost = null;
    public $selectedMediaIndex = 0;


    public function handleOpenForm()
    {
        $this->isShowForm = true;
    }

    public function handleCloseForm()
    {
        $this->isShowForm = false;
        $this->isEditMode = false;
        $this->reset('date', 'postTitle', 'content', 'mediaFiles', 'mediaUpload', 'postId');
        $this->resetValidation();
        $this->dispatch('editorContentUpdated', content: '');
    }

    public function updatedMediaUpload()
    {
        $this->validate([
            'mediaUpload' => 'file|mimes:jpeg,jpg,png,mp4|max:5120',
        ]);

        if ($this->mediaUpload && count($this->mediaFiles) < $this->maxMediaFiles) {
            $this->mediaFiles[] = $this->mediaUpload;
            $this->mediaUpload = null; // Reset for next upload
        }
    }

    public function removeMedia($index)
    {
        if (isset($this->mediaFiles[$index])) {
            unset($this->mediaFiles[$index]);
            $this->mediaFiles = array_values($this->mediaFiles); // Re-index array
        }
    }

    public function handleEdit($postId)
    {
        $post = Post::with('media')->find($postId);
        if (!$post) {
            Toaster::error('Data tidak ditemukan');
            return;
        }

        $this->isEditMode = true;
        $this->postId = $post->id;
        $this->date = $post->date;
        $this->postTitle = $post->title;
        $this->content = $post->content;
        // Load existing media
        $this->mediaFiles = $post->media->sortBy('order')->values()->toArray();

        $this->isShowForm = true;
        $this->dispatch('editorContentUpdated', content: $this->content);
    }

    public function handleSave()
    {
        // Validate basic fields with custom Indonesian messages
        $this->validate(
            [
                'date' => 'required',
                'postTitle' => 'required|max:50',
                'content' => 'required',
            ],
            [
                'date.required' => 'Tanggal harus diisi',
                'postTitle.required' => 'Judul post harus diisi',
                'postTitle.max' => 'Judul post tidak boleh lebih dari 50 karakter',
                'content.required' => 'Konten post harus diisi',
            ]
        );

        // Validate new media uploads only (not existing media)
        foreach ($this->mediaFiles as $index => $media) {
            if ($media instanceof \Illuminate\Http\UploadedFile) {
                $this->validate(
                    [
                        "mediaFiles.{$index}" => 'file|mimes:jpeg,jpg,png,mp4|max:5120', // 5MB max
                    ],
                    [
                        "mediaFiles.{$index}.file" => 'File harus berupa dokumen yang valid',
                        "mediaFiles.{$index}.mimes" => 'File harus berupa jpeg, jpg, png, atau mp4',
                        "mediaFiles.{$index}.max" => 'Ukuran file tidak boleh lebih dari 5MB',
                    ]
                );
            }
        }

        $slug = strtolower(str_replace(' ', '-', $this->postTitle));

        if ($this->isEditMode) {
            $post = Post::find($this->postId);
            if (!$post) {
                Toaster::error('Data tidak ditemukan');
                return;
            }

            $post->update([
                'date' => $this->date,
                'title' => $this->postTitle,
                'slug' => $slug,
                'content' => $this->content,
            ]);

            // Get existing media IDs
            $existingMediaIds = $post->media->pluck('id')->toArray();

            // Track which existing media to keep
            $keepMediaIds = [];

            // Handle media updates
            foreach ($this->mediaFiles as $index => $media) {
                if ($media instanceof \Illuminate\Http\UploadedFile) {
                    // This is a new upload
                    $timestamp = time();
                    $mediaName = $slug . '-' . ($index + 1) . '-' . $timestamp . '.' . $media->getClientOriginalExtension();
                    $mediaUrl = 'storage/' . $media->storeAs('post-media', $mediaName, 'public');

                    // Get the media type
                    $mediaType = strpos($media->getMimeType(), 'video') !== false ? 'video' : 'image';

                    // Create new media record
                    $post->media()->create([
                        'type' => $mediaType,
                        'url' => $mediaUrl,
                        'order' => $index + 1,
                    ]);
                } elseif (is_array($media) && isset($media['id'])) {
                    // This is an existing media item
                    $keepMediaIds[] = $media['id'];

                    // Update the order if needed
                    $existingMedia = $post->media()->find($media['id']);
                    if ($existingMedia && $existingMedia->order != $index + 1) {
                        $existingMedia->update([
                            'order' => $index + 1,
                        ]);
                    }
                }
            }

            // Delete media items that weren't kept
            foreach ($existingMediaIds as $mediaId) {
                if (!in_array($mediaId, $keepMediaIds)) {
                    $media = $post->media()->find($mediaId);
                    if ($media) {
                        // Delete file from storage
                        if (Storage::disk('public')->exists(str_replace('storage/', '', $media->url))) {
                            Storage::disk('public')->delete(str_replace('storage/', '', $media->url));
                        }
                        $media->delete();
                    }
                }
            }

            Toaster::success('Data berhasil diperbarui');
        } else {
            // Create new post
            $post = Post::create([
                'date' => $this->date,
                'title' => $this->postTitle,
                'slug' => $slug,
                'content' => $this->content,
            ]);

            // Handle media uploads for new post
            foreach ($this->mediaFiles as $index => $media) {
                if ($media instanceof \Illuminate\Http\UploadedFile) {
                    $timestamp = time();
                    $mediaName = $slug . '-' . ($index + 1) . '-' . $timestamp . '.' . $media->getClientOriginalExtension();
                    $mediaUrl = 'storage/' . $media->storeAs('post-media', $mediaName, 'public');

                    // Get the media type
                    $mediaType = strpos($media->getMimeType(), 'video') !== false ? 'video' : 'image';

                    // Create new media record
                    $post->media()->create([
                        'type' => $mediaType,
                        'url' => $mediaUrl,
                        'order' => $index + 1,
                    ]);
                }
            }

            Toaster::success('Data berhasil ditambahkan');
        }

        $this->handleCloseForm();
    }

    public function handleOpenModal($postId)
    {
        $this->selectedPost = Post::with('media')->find($postId);
        if (!$this->selectedPost) {
            Toaster::error('Data tidak ditemukan');
            return;
        }

        $this->selectedMediaIndex = 0;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedPost = null;
        $this->selectedMediaIndex = 0;
    }

    public function setSelectedMedia($index)
    {
        $this->selectedMediaIndex = $index;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            // If clicking the same field, toggle direction
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            // If clicking a new field, set it and default to desc (newest first)
            $this->sortField = $field;
            $this->sortDirection = 'desc';
        }

        // Reset pagination when sorting changes
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setPerPage($value)
    {
        $this->perPage = $value;
        $this->resetPage();
    }

    public function handleDelete()
    {
        $post = Post::find($this->postId);
        if (!$post) {
            Toaster::error('Data tidak ditemukan');
            return;
        }

        // Delete associated media
        foreach ($post->media as $media) {
            if (Storage::disk('public')->exists(str_replace('storage/', '', $media->url))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $media->url));
            }
            $media->delete();
        }
        $post->delete();

        Toaster::success('Data berhasil dihapus');
        $this->handleCloseForm();
    }

    public function render()
    {
        $posts = Post::where('title', 'like', "%$this->search%")->with('media')->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.revolusi-posts', [
            'posts' => $posts,
        ]);
    }
}
