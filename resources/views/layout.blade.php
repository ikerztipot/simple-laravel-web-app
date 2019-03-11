<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'My App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">

    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/custom.css') }}"/>
    <script src="{{ asset('js/main.js') }}" type="text/javascript" ></script>
</head>
<body>
    <nav class="navbar">
        <ul class="navbar-menu">
            <li class="navbar-item"><a href="/">Home</a></li>
            <li class="navbar-item"><a href="/projects">Projects</a></li>
            <li class="navbar-item"><a href="/contact">Contact</a></li>
            <li class="navbar-item"><a href="/about">About</a></li>
            <li class="navbar-item"><a href="/user">User</a></li>
        </ul>
        <ul class="navbar-menu">
            <li class="navbar-item">Hello {{ auth()->user() ? auth()->user()->name : 'guest' }}</li>
        </ul>
    </nav>
    <div class="container">
    @yield('content')
    </div>

</body>
</html>