<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hapi.Bytes</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Design -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    <script src="{{ asset('build/assets/app.js') }}" defer></script>

</head>

<body class="scroll-smooth bg-gray-100">
    <!-- Header -->
    <x-header />

    <!-- Hero Blade -->
    <x-hero />

    <!-- Modal -->
    @if (session('message'))
    <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
        <div class="dark:bg-gray-900 p-6 rounded-lg shadow-lg w-11/12 max-w-md text-center">
            <h3 class="text-lg font-medium text-green-500">{{ session('message') }}</h3>
            <button id="closeModal" class="mt-4 px-4 py-2 bg-orange font-medium text-gray-800 rounded hover:bg-gray-600 hover:text-white">
                Close
            </button>
        </div>
    </div>
    @endif

    <!-- Footer -->
    <x-footer />

    <script>
        window.onload = function() {
            const modal = document.getElementById('modal');
            const closeModal = document.getElementById('closeModal');

            if (modal) {
                closeModal.addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            }
        };
    </script>
</body>

</html>