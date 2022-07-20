<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <link href="/css/preloader.css" rel="stylesheet">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="/storage/GamesKu Icon.png">
  </head>
</head>
<style>
    .form-custom{
        background-color: #C4C4C4;
    }
</style>
<body class="d-flex flex-column min-vh-100">
    {{-- @if (!Request::is('/') && !Request::is('login') && !Request::is('register')) --}}
        {{-- @include('partials.navbar') --}}
    {{-- @endif --}}
    {{-- perlu navbar tinggal include di masing" section --}}
    <div class="loader">
        <div class="loading-dot"></div>
    </div>
    @yield('container')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>
