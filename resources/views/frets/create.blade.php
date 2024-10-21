<x-layout>
    @if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{url(route('frets.store'))}}" method="POST">
        @csrf

        <label for="fret">Fret:</label>
        <input type="text" id="fret" name="fret" placeholder="fret:">

        <button type="submit">Add fret</button>
    </form>
</x-layout>
