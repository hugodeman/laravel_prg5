<x-layout>
    <h2> Fret:{{ $fret->fret }}</h2>
    <form action="{{ route('frets.destroy', $fret) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>
</x-layout>
