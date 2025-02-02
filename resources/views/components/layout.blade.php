<!DOCTYPE html>
<html lang="en" class="h-full bg-green-100"> <!-- Ubah warna background menjadi hijau muda -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title ?? 'Default Title' }}</title>
</head>
<body class="h-full">
    <div class="min-h-full">
        <!-- Navbar Component -->
        <x-navbar></x-navbar>

        <!-- Header Component -->
        <x-header>{{ $title }}</x-header>

        <!-- Main Content -->
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
