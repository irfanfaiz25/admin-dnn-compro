@extends('layouts.main')

@section('content')
    <div class="p-2">
        <h1 class="text-4xl font-display font-bold">
            Halaman Produk
        </h1>
        <div class="mt-8 w-full space-y-10">
            @livewire('produk-hero')
        </div>
    </div>
@endsection
