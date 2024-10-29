<x-layout>
    <x-admin>
<h2>Users:</h2>
        @foreach($users as $user)
            <ul>
                <li>
                    <p>Id: {{ $user->id }}</p>
                </li>
            <li>
                <p>Name: {{ $user->name }}</p>
            </li>
                <li>
                    <p>E-mail: {{ $user->email }}</p>
                </li>
                <li>
                    <p>Chords created: {{ $user->chordCount }}</p>
                </li>
                <form action="{{ url(route('users.update',$user->id)) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if($user->active)
                    <button type="submit">Deactivate</button>
                    @else
                    <button type="submit">Activate</button>
                    @endif
                </form>

                <form action="{{url(route('users.destroy', $user->id)) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete user</button>
                </form>
            </ul>
<br>
        @endforeach

    </x-admin>
</x-layout>
