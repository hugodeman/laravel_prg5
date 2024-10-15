<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chords</title>
</head>
<body>
<nav>
{{--    <x-nav-link href="{{ url(route('chords.show') )}}"> </x-nav-link>--}}
    <x-nav-link href="{{ url(route('chords.index') )}}"> chords </x-nav-link>
{{--    <x-nav-link href="{{ url(route('chords') )}}"> </x-nav-link>--}}

</nav>
    <header>
        <h1>Chord list</h1>
    </header>
    <main>
        <p>{{ $slot }}</p>
    </main>
</body>
</html>
