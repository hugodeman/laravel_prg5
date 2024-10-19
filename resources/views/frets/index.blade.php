<x-layout>

{{--    <a href="frets/{{url(Route('frets.show'))}}">Show</a>--}}
    <a href="{{  url(route('frets.create')) }}">Create frets</a>
    <h1>Frets:</h1>

    <ul>
        @foreach($frets as $fret)
            <li>
                <x-fret :fret="$fret"/>
            </li>

            <br>
        @endforeach
    </ul>
</x-layout>
