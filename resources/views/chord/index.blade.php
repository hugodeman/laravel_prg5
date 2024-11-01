<x-layout>
    <h1>Guitar chords list:</h1>
    @if(\Auth::check())
    <a href="{{ url(route('chords.create')) }}">Create new chord</a>
    @endif

    <h2>Tags:</h2>
    @foreach($tags as $tag)
        <a href="{{ route('chords.filterTag', $tag->id) }}" class="tag-link">
            {{ $tag->name }}
        </a>
    @endforeach
    <br><br>
    @if(\Auth::check())
        <h3>You have created {{$chordCount}} chords</h3>
        @if($chordCount >=1)
            <a href="{{ route('chords.filterUser') }}">See your chords </a>
        @else
            <a href="{{ url(route('chords.create')) }}">Create new chord</a>
        @endif
    @endif
    <br>

        <h2>Chords:</h2>
        <h3>Total chords found: {{ $chords->count() }}</h3>
            @foreach($chords as $chord)
                @if($chord->status || \Auth::user()->is_admin)
                    <ul id="chord-index">
                        <li>
                            Chord name: {{ $chord ->name }}
                        </li>
                        <li>
                            Chord notes: {{ $chord ->note }}
                        </li>
                        <li>
                            @foreach($chord->tags as $tag)
                                <a href="{{ route('chords.filterTag', $tag->id) }}" class="tag-link">{{ $tag->name }}</a>
                            @endforeach
                        </li>
                        <li>
                        <a href="/chords/{{ $chord['id'] }}">Details</a>
                        @if(\Auth::check())
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
                        @endif

                            <br>

                    </ul>
                @endif
            @endforeach
</x-layout>
