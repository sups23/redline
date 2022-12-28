<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>
    
        @include('layouts.navbar')
        <div style="min-height: 570px; margin-top:100px"> 
            @yield('content')
        </div>
        <hr>
        <footer>@include('layouts.footer')</footer>
    
</body>
</html>