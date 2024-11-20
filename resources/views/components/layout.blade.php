<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>presto.it</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('loghi/Logo.png') }}" type="image/x-icon">
</head>

<body class="background-color">
    <x-navbar3 />

    <main>
        {{ $slot }}
    </main>


    <x-footer />
</body>

</html>
