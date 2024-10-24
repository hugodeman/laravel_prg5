<x-layout>
    <h1>Guitar chords list:</h1>
    <a href="{{ url(route('chords.create')) }}">Create new chord</a>
    <ul>
        @foreach($chords as $chord)
            <li>
                Chord name: {{ $chord ->name }}
            </li>
            <li>
                Chord notes: {{ $chord ->note }}
            </li>

            <a href="/chords/{{ $chord['id'] }}">Details</a>
            <br>
            <br>
        @endforeach
    </ul>
</x-layout>
