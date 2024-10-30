<x-layout>
    <h1>Guitar chords list:</h1>
    <a href="{{ url(route('chords.create')) }}">Create new chord</a>

    <h2>Tags:</h2>
    @foreach($tags as $tag)
        <x-tag :$tag/>
    @endforeach
    <br><br>

    <ul>
        <h2>Chords:</h2>
        <div id="chord-index">
            @foreach($chords as $chord)
                @if($chord->status || \Auth::user()->is_admin)
                    <li>
                        Chord name: {{ $chord ->name }}
                    </li>
                    <li>
                        Chord notes: {{ $chord ->note }}
                    </li>
                    <li>
                        @foreach($tags as $tag)
                            <a href="#">{{ $tag ->name }}</a>
                        @endforeach
                    </li>

                    <li>
                    <a href="/chords/{{ $chord['id'] }}">Details</a>

                    @if($chord ->user_id ===\Auth::user()->id && $chordCount >= 3 || \Auth::user()->is_admin )

                        <a href="{{ url(route('chords.edit', $chord->id)) }}">edit chord</a>
                        <form action="{{ url(route('chords.destroy', $chord->id)) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete chord</button>
                        </form>

                        @if(\Auth::user()->is_admin)
                            <form action="{{ url(route('chords.updateStatus',$chord->id)) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                @if($chord->status)
                                    <button type="submit">Unpublish</button>
                                @else
                                    <button type="submit">Publish</button>
                                @endif


                            </form>
                        @endif

                        @if(\Auth::user()->is_admin)
                            <p>Als admin mag jij dit zien</p>
                        @else
                            <p>Je hebt drie chords gemaakt dus mag jij dit zien!</p>
                        @endif
                    @endif
                    </li>

                        <br>
                        <br>
                @endif
            @endforeach
        </div>
    </ul>
</x-layout>
