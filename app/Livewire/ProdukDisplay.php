<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class ProdukDisplay extends Component
{
    use WithFileUploads;

    public $isShowForm = false;
    public $productName = '';
    public $series = '';
    public $stock;
    public $productDescription = '';
    public $racikan = '';
    public $karakter = '';
    public $rempah = '';
    public $kemasan = '';
    public $detailImage;
    public $existingDetailImage;
    public $packImage;
    public $existingPackImage;

    public $isEditMode = false;
    public $productId;


    public function handleOpenForm()
    {
        $this->isShowForm = true;
    }

    public function handleCloseForm()
    {
        $this->isShowForm = false;
        $this->isEditMode = false;
        $this->reset('productName', 'series', 'stock', 'productDescription', 'racikan', 'karakter', 'rempah', 'kemasan', 'detailImage', 'existingDetailImage', 'packImage', 'existingPackImage', 'productId');
    }

    public function handleEdit($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            Toaster::error('Produk tidak ditemukan');
            return;
        }

        $this->isEditMode = true;
        $this->productId = $product->id;
        $this->productName = $product->name;
        $this->series = $product->series;
        $this->stock = $product->stock;
        $this->productDescription = $product->description;
        $this->racikan = $product->racikan;
        $this->karakter = $product->karakter;
        $this->rempah = $product->rempah;
        $this->kemasan = $product->kemasan;
        $this->existingDetailImage = $product->detailImage;
        $this->existingPackImage = $product->packImage;
        $this->handleOpenForm();
    }

    public function handleSave()
    {
        $product = Product::find($this->productId);

        $validationRules = [
            'productName' => 'required|max:50',
            'series' => 'required|max:20',
            'stock' => 'required|boolean',
            'productDescription' => 'required',
            'racikan' => 'required|max:50',
            'karakter' => 'required|max:50',
            'rempah' => 'required|max:50',
            'kemasan' => 'required|integer',
        ];

        // Add image validation rules based on edit mode
        if (!$this->isEditMode) {
            $validationRules['detailImage'] = 'required|mimes:png,jpg,jpeg|max:2048';
            $validationRules['packImage'] = 'required|mimes:png|max:2048';
        } else {
            // In edit mode, image is optional but must be valid if provided
            $validationRules['detailImage'] = $this->detailImage ? 'mimes:png,jpg,jpeg|max:2048' : '';
            $validationRules['packImage'] = $this->packImage ? 'mimes:png|max:2048' : '';
        }

        $this->validate($validationRules);

        $detailImage = $this->existingDetailImage;
        $packImage = $this->existingPackImage;

        if ($this->detailImage) {
            $timestamp = time();
            $fileName = 'detail' . strtolower(str_replace(' ', '_', $this->productName)) . '-' . $timestamp . '.' . $this->detailImage->getClientOriginalExtension();
            $detailImage = 'storage/' . $this->detailImage->storeAs('img/products', $fileName, 'public');

            if ($this->isEditMode && $product->detailImage && Storage::disk('public')->exists(str_replace('storage/', '', $product->detailImage))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->detailImage));
            }
        }

        if ($this->packImage) {
            $timestamp = time();
            $fileName = 'pack' . strtolower(str_replace(' ', '_', $this->productName)) . '-' . $timestamp . '.' . $this->packImage->getClientOriginalExtension();
            $packImage = 'storage/' . $this->packImage->storeAs('img/products', $fileName, 'public');

            if ($this->isEditMode && $product->packImage && Storage::disk('public')->exists(str_replace('storage/', '', $product->packImage))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->packImage));
            }
        }

        if ($this->isEditMode) {
            if (!$product) {
                Toaster::error('Produk tidak ditemukan');
                return;
            }

            $product->update([
                'name' => $this->productName,
                'series' => $this->series,
                'stock' => (bool) $this->stock,
                'description' => $this->productDescription,
                'racikan' => $this->racikan,
                'karakter' => $this->karakter,
                'rempah' => $this->rempah,
                'kemasan' => $this->kemasan,
                'detailImage' => $detailImage,
                'packImage' => $packImage,
            ]);
        } else {
            Product::create([
                'name' => $this->productName,
                'series' => $this->series,
                'stock' => (bool) $this->stock,
                'description' => $this->productDescription,
                'racikan' => $this->racikan,
                'karakter' => $this->karakter,
                'rempah' => $this->rempah,
                'kemasan' => $this->kemasan,
                'detailImage' => $detailImage,
                'packImage' => $packImage,
            ]);
        }

        $message = $this->isEditMode ? 'Produk berhasil diperbarui' : 'Produk berhasil ditambahkan';
        Toaster::success($message);
        $this->handleCloseForm();
    }

    public function handleDelete($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            Toaster::error('Produk tidak ditemukan');
            return;
        }

        if ($product->detailImage && Storage::disk('public')->exists(str_replace('storage/', '', $product->detailImage))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $product->detailImage));
        }

        if ($product->packImage && Storage::disk('public')->exists(str_replace('storage/', '', $product->packImage))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $product->packImage));
        }

        $product->delete();
        Toaster::success('Produk berhasil dihapus');
    }

    public function render()
    {
        $products = Product::latest()->get();

        return view('livewire.produk-display', [
            'products' => $products,
        ]);
    }
}
