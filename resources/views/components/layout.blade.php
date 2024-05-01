<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>


    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-800">
<nav class="navbar bg-[#344955] mx-auto rounded-full max-w-80 mt-6  flex items-center justify-center shadow-xl">
    <ul class="">
        <x-nav href="/">Home</x-nav>
        <x-nav href="/about">About</x-nav>
        <x-nav href="/contact">Contact</x-nav>
        <x-nav href="/add">Add</x-nav>
    </ul>
</nav>
<?= $slot ?>
</body>
</html>
