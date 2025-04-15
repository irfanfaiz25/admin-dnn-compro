<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <script>
        // Initialize dark mode on page load
        function initializeDarkMode() {
            const isDark = localStorage.getItem('darkMode') === 'true';
            document.documentElement.classList.toggle('dark', isDark);
        }

        // Apply dark mode after Livewire navigation
        document.addEventListener('livewire:navigated', () => {
            initializeDarkMode();
        });

        // Initial setup
        initializeDarkMode();
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <!-- Include Trix CSS/JS -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.css" />

    {{-- icon --}}
    <script src="https://kit.fontawesome.com/0cb804cef9.js" crossorigin="anonymous"></script>
</head>

<body class="bg-[#FAFAFA] dark:bg-[#1c1c1c] font-sans">
    @livewire('header-layout')

    <div class="relative">
        <div class="flex gap-6 pt-16">

            @livewire('sidebar-toggle')

            <div
                class="flex-1 p-4 text-xl bg-[#FAFAFA] dark:bg-[#1c1c1c] text-gray-900 dark:text-gray-50 font-semibold overflow-auto relative min-h-screen duration-500 -ml-5 lg:ml-64">

                @yield('content')

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    @livewireScripts

    <x-toaster-hub />

    @stack('scripts')
</body>

</html>
