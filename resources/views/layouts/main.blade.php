<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>@yield('title')</title>
  </head>
</head>
<style>
    a{
        text-decoration: none;
    }
    .btn-primary, .btn-primary:active, .btn-primary:visited{
        background-color: #0B0C10;
        border: solid 1.2pt #0B0C10;
        color: #C5C6C7;
    }
    .btn-primary:hover{
        background-color: #ffffff;
        color: #0B0C10;
        border: solid 1.2pt #0B0C10;
    }
    .btn-secondary, .btn-secondary:active, .btn-secondary:visited{
        background-color: #ffffff;
        border: solid 1.2pt #0B0C10;
        color: #0B0C10;
    }
    .btn-secondary:hover{
        background-color: #0B0C10;
        border: solid 1.2pt #0B0C10;
        color: #C5C6C7;
    }
    .form-custom{
        background-color: #C4C4C4;
    }
</style>
<body>
    {{-- @if (!Request::is('/') && !Request::is('login') && !Request::is('register')) --}}
        {{-- @include('partials.navbar') --}}
    {{-- @endif --}}
    {{-- perlu navbar tinggal include di masing" section --}}
    @yield('container')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
