<x-layout>

        <form action="{{url(route('chords.store'))}}" method="POST">
            @csrf

            <label for="name">Name: </label>
            <input type="text" id="name" name="name" placeholder="Name:">

            @error('name')
            {{ $message }}
            <br><br>
            @enderror

            <label for="note">Notes: </label>
            <input type="text" id="note" name="note" placeholder="Notes:">

            @error('note')
            {{ $message }}
            <br><br>
            @enderror

            <label for="fret_id">Fret:</label>
            <select name="fret_id" id="fret_id">
                <option value="" selected disabled>choose a fret</option>
                @foreach($frets as $fret)
                    <option value="{{ $fret->id }}">{{ $fret->fret }}</option>
                @endforeach
            </select>
            @error('fret_id')
                <br><br>
                {{ $message }}
            @enderror

            <br> <br>
            <label for="tag">Tag:</label>
            <select name="tag[]" id="tag" required>

                <option value="" selected disabled>choose tag</option>
                    @foreach($tags as $tag)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
            </select>

            @error('tag')
            {{ $message }}
            @enderror

            <br><br>
            <label for="tag">Tag:</label>
            <select name="tag[]" id="tag" required>

                <option value="" selected disabled>choose tag</option>
                    @foreach($tags as $tag)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
            </select>

            @error('tag')
            {{ $message }}
            @enderror
            <br>
            <br>
            <button type="submit">Add Chord</button>
        </form>

</x-layout>
