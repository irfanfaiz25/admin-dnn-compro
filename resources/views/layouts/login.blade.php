<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    {{-- icon --}}
    <script src="https://kit.fontawesome.com/0cb804cef9.js" crossorigin="anonymous"></script>
</head>

<body class="bg-[#FAFAFA] dark:bg-[#1c1c1c] font-sans">

    @livewire('login-form')

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @livewireScripts

    <x-toaster-hub />

    @stack('scripts')
</body>

</html>
