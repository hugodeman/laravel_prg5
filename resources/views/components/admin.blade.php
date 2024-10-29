<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Guitar chord learner</title>
</head>
<body>
<header>
    <h1>Welcome Admin: {{ \Auth::user()->name }}</h1>

    <a href="{{ url(route('chords.index')) }}">Chord list</a>
    <a href="{{ url(route('frets.index')) }}">Fret list</a>
        <a href="{{ url(route('users.index')) }}">User list</a>

    <br>
</header>
<main><br><br>{{ $slot }}</main>

</body>
</html>
