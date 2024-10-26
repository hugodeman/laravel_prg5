<x-layout>
    <x-layout>

        @if ($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{url(route('chords.update'))}}" method="POST">
            @csrf

            <label for="name">Name: </label>
            <input type="text" id="name" name="name" placeholder="Name:">

            <label for="note">Notes: </label>
            <input type="text" id="note" name="note" placeholder="Notes:">

            <label for="fret_id">Fret:</label>
            <select name="fret_id" id="fret_id">
                @foreach($frets as $fret)
                    <option value="{{ $fret->id }}">{{ $fret->fret }}</option>
                @endforeach
            </select>

            <button type="submit">Update Chord</button>
        </form>

    </x-layout>

</x-layout>
