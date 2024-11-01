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
    <li>
        Tags:
        @foreach($chord->tags as $tag)
            <a href="{{ route('chords.filterTag', $tag->id) }}" class="tag-link">{{ $tag->name }}</a>
        @endforeach
    </li>
</x-layout>
