<x-layout>

        @if ($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{url(route('chords.update', $chord->id))}}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Change chord name: </label>
            <input type="text" id="name" name="name" placeholder="Name:">

            <label for="note">Change chord notes: </label>
            <input type="text" id="note" name="note" placeholder="Notes:">

            <label for="fret_id">Change fret:</label>
            <select name="fret_id" id="fret_id">
                @foreach($frets as $fret)
                    <option value="{{ $fret->id }}">{{ $fret->fret }}</option>
                @endforeach
            </select>

            <button type="submit">Update Chord</button>
        </form>

    </x-layout>
