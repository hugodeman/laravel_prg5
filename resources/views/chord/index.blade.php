<x-layout>
    <ul>
        @foreach($chords as $chord)
            <a href="/chords/{{ $chord['id'] }}">click</a>
            <li>
                Chord name: {{ $chord ->name }}
            </li>
            <li>
                Chord notes: {{ $chord ->note }}
            </li>
            <br>
        @endforeach
    </ul>
</x-layout>
