<x-layout>
    <h1>Guitar chord</h1>
<li>
    Chord name: {{ $chord ->name }}
</li>
<li>
    Chord notes: {{ $chord ->note }}
</li>
    <li>
        Starts at fret: {{ $chord ->fret ->fret }}
    </li>
    <li>Created by: {{ $chord ->user -> name }}</li>
</x-layout>
