<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Guitar Chords</title>
</head>
<body>
<nav>
    <x-nav-link href="{{ url(route('home.index') )}}"> Home </x-nav-link>
    <x-nav-link href="{{ url(route('chords.index') )}}"> Chords </x-nav-link>
    <x-nav-link href="{{ url(route('frets.index') )}}"> Frets </x-nav-link>
    <x-nav-link href="{{ url(route('dashboard') )}}"> Dashboard </x-nav-link>

    @if(\Auth::check())
        @if(\Auth::user()->is_admin)
          <x-nav-link href="{{ url(route('admin.index') )}}"> Admin dashboard </x-nav-link>
       @endif
    @endif
</nav>

<header>

</header>
<main>
    <p>{{ $slot }}</p>
</main>

<footer>

</footer>
</body>
</html>
