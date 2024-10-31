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

                <br>

            @if(\Auth::check())
                <a href="{{ url(route('frets.edit', $fret->id)) }}">edit fret</a>
            @endif

{{--                <form action="{{ route('frets.destroy') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit">Delete fret</button>--}}
{{--                </form>--}}

                <br><br>

        @endforeach
    </ul>
</x-layout>

