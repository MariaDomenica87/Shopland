<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/media/icon/icon.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite (['resources/css/app.css', 'resources/js/app.js'])
    <title>ShopLand</title>
</head>

<body>

    <x-navbar />
    <x-mini-nav />

    <main class="min-vh-100 ">

        {{ $slot }}
    </main>

    <x-footer />




    <script src="https://kit.fontawesome.com/3c3e12cc4a.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @stack('scripts')
    @livewireStyles
    @livewireScripts
</body>

</html>
