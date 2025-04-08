@extends('layouts.main')

@section('content')
    <div class="p-2">
        <h1 class="text-4xl font-display font-bold">
            Halaman Tim & Manajemen
        </h1>
        <div class="mt-8 w-full space-y-10">
            @livewire('tim-hero')
            @livewire('tim-achievement')
            @livewire('tim-branches')
            @livewire('tim-testimonial')
        </div>
    </div>
@endsection
