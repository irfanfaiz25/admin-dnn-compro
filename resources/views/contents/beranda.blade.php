@extends('layouts.main')

@section('content')
    <div class="p-2">
        <h1 class="text-3xl font-display font-bold">
            Halaman Beranda
        </h1>
        <div class="mt-8 w-full">
            {{-- Hero Section --}}
            @livewire('beranda-hero')
        </div>
    </div>
@endsection
