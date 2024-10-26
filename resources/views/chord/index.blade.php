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
        @if($chord ->user_id ===\Auth::user()->id && $chordCount >= 3 )

            <a href="{{ url(route('chords.edit', $chord->id)) }}">edit chord</a>
                <a href="{{ url(route('chords.destroy', $chord->id)) }}">Delete chord</a>
        @endif

            <br>
            <br>
        @endforeach
    </ul>
</x-layout>
