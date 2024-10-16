<x-layout>
    <form action="{{url(route('frets.store'))}}" method="POST">
        @csrf

        <label for="fret">Fret:</label>
        <input type="text" id="fret" name="fret" placeholder="fret:">

        <button type="submit">Add fret</button>
    </form>
</x-layout>
