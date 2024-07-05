<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50" style="font-family: 'Caveat', cursive;">

    @session('success')
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endsession

    @include('components.navigation')

    @yield('slot')
    {{-- @section('slot') --}}

    @yield('script')

    <script src="https://kit.fontawesome.com/f631e8c7da.js" crossorigin="anonymous"></script>

</body>

</html>
