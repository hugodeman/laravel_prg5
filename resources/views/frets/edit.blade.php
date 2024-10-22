<x-layout>
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h2> Update fret: {{ $fret->fret }} </h2>

    <form action="{{ url(route('frets.update', $fret->id)) }}" method="POST">
    @csrf
        @method('PUT')
        <label for="fret">Change fret to:</label>
        <br>
    <input type="text" id="fret" name="fret" placeholder="fret:">
        <button type="submit">Update fret</button>
    </form>
</x-layout>
