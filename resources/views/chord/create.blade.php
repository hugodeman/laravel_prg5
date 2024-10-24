<x-layout>

    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

        <form action="{{url(route('chords.store'))}}" method="POST">
            @csrf

            <label for="name">Name: </label>
            <input type="text" id="name" name="name" placeholder="Name:">

            <label for="note">Notes: </label>
            <input type="text" id="note" name="note" placeholder="Notes:">

            <button type="submit">Add Chord</button>
        </form>

</x-layout>
