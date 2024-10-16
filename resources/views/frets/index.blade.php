<x-layout>
    <ul>
        @foreach($frets as $fret)
            <li>
                <x-fret :fret="$fret"/>
            </li>

            <br>
        @endforeach
    </ul>
</x-layout>
