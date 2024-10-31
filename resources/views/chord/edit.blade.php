<x-layout>

        <form action="{{url(route('chords.update', $chord->id))}}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Change chord name: </label>
            <input type="text" id="name" name="name" placeholder="Name:" value="{{ $chord->name }}">

            @error('name')
            {{ $message }}
            <br><br>
            @enderror

            <label for="note">Change chord notes: </label>
            <input type="text" id="note" name="note" placeholder="Notes:" value="{{ $chord->note }}">

            @error('note')
            {{ $message }}
            <br><br>
            @enderror

            <label for="fret_id">Change fret:</label>
            <select name="fret_id" id="fret_id">
                @foreach($frets as $fret)
                    <option value="{{ $fret->id }}">{{ $fret->fret }}</option>
                @endforeach
            </select>

            @error('fret_id')
            <br><br>
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


            <button type="submit">Update Chord</button>
        </form>

    </x-layout>
