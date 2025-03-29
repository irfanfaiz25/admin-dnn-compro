@extends('layouts.main')

@section('content')
    <div class="p-2">
        <h1 class="text-4xl font-display font-bold">
            Halaman Beranda
        </h1>
        <div class="mt-8 w-full space-y-10">
            {{-- Hero Section --}}
            @livewire('beranda-hero')

            {{-- About Section --}}
            @livewire('beranda-about')

            {{-- Featured Products --}}
            @livewire('beranda-product')

            {{-- Testimonials --}}
            @livewire('beranda-testimonial')
        </div>
    </div>
@endsection
