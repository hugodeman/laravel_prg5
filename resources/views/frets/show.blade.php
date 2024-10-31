<x-layout>
    <h2> Fret:{{ $fret->fret }}</h2>
    @if(\Auth::check())
    <form action="{{ route('frets.destroy', $fret) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>
    @endif
</x-layout>
