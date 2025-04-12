<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class RevolusiPosts extends Component
{
    use WithFileUploads;

    public $mediaFiles = [];
    public $mediaUpload;
    public $maxMediaFiles = 5;

    public $showModal = false;
    public $selectedPost = null;
    public $selectedMediaIndex = 0;

    // Add these validation rules
    protected $rules = [
        'mediaFiles.*' => 'file|mimes:jpeg,jpg,png,mp4|max:5120', // 5MB max
        'mediaUpload' => 'nullable|file|mimes:jpeg,jpg,png,mp4|max:5120',
        'media1' => 'nullable|file|mimes:jpeg,jpg,png,mp4|max:5120',
        'media2' => 'nullable|file|mimes:jpeg,jpg,png,mp4|max:5120',
        'media3' => 'nullable|file|mimes:jpeg,jpg,png,mp4|max:5120',
        'media4' => 'nullable|file|mimes:jpeg,jpg,png,mp4|max:5120',
        'media5' => 'nullable|file|mimes:jpeg,jpg,png,mp4|max:5120',
        'description' => 'nullable|string',
    ];

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

    public function handleOpenModal()
    {
        // In a real application, you would fetch the post data from your database
        // For now, we'll use dummy data
        $this->selectedPost = [
            'id' => 1,
            'title' => 'Ini Judul',
            'date' => 'Januari 23, 2025',
            'description' => 'Dengan bangga kami memperkenalkan Kedathon Nusantara, sebuah produk rokok premium yang menggabungkan cita rasa tembakau pilihan dari berbagai penjuru Nusantara. Diproduksi dengan standar kualitas tinggi dan menggunakan teknologi modern, Kedathon Nusantara hadir untuk memberikan pengalaman merokok yang tak tertandingi.

Setiap batang Kedathon Nusantara merupakan hasil dari perpaduan sempurna antara tradisi dan inovasi. Kami memilih daun tembakau terbaik yang dipanen pada waktu yang tepat, kemudian diolah dengan metode khusus untuk menghasilkan cita rasa yang khas dan aroma yang menggoda.',
            'media' => [
                [
                    'id' => 1,
                    'type' => 'image',
                    'url' => '/img/picture1.jpg',
                ],
                [
                    'id' => 2,
                    'type' => 'image',
                    'url' => '/img/news-background.jpg',
                ],
                [
                    'id' => 3,
                    'type' => 'image',
                    'url' => '/img/picture1.jpg',
                ],
            ]
        ];

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

    public function editPost()
    {
        // Logic to handle editing the post
        // This could populate the form below with the selected post data
        $this->closeModal();

        // Example: populate the form with the selected post data
        // $this->date = $this->selectedPost['date'];
        // $this->postTitle = $this->selectedPost['title'];
        // $this->description = $this->selectedPost['description'];
    }

    public function save()
    {
        dd($this->description);
    }

    public function render()
    {
        return view('livewire.revolusi-posts');
    }
}
