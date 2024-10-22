<x-layout>

    <a href="{{  url(route('frets.create')) }}">Create frets</a>

    <h1>Frets:</h1>

    <ul>
        @foreach($frets as $fret)

            <li>
                <x-fret :fret="$fret" />

                <a href="{{ url(route('frets.show', $fret->id)) }}">Show fret</a>

                <br>

                <a href="{{ url(route('frets.edit', $fret->id)) }}">edit fret</a>

{{--                <form action="{{ route('frets.destroy') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit">Delete fret</button>--}}
{{--                </form>--}}

                <br>
            </li>
        @endforeach
    </ul>
</x-layout>

