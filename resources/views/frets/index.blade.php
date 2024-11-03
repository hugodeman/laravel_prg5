<x-layout>

    @if(\Auth::check())
    <a href="{{  url(route('frets.create')) }}">Create frets</a>
    @endif

    <h1>Frets:</h1>

    <ul>
        @foreach($frets as $fret)

            <li>
                <x-fret :fret="$fret" />
                </li>

                <a href="{{ url(route('frets.show', $fret->id)) }}">Show fret</a>
                <br><br>

        @endforeach
    </ul>
</x-layout>

