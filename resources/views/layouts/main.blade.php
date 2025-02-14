<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/w3-css/4.1.0/w3.css">


    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>
<div class="wrapper">
    @include('includes.front.header')

    <!-- Offcanvas Menu -->
    @include('includes.front.mobile_menu')

    <main class="main">
        @yield('content')
    </main>

    @include('includes.front.footer')
</div>


{{--<script src="js/main.js"></script>--}}
</body>
</html>
