<table>
@foreach( $users as $user )
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
        <td>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">edit</a>

            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
</table>

    @if(Auth::user()->role == 1)
        <a href="{{route('users.create')}}">
            <button> add user </button>
        </a>
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-danger">logout</button>
        </form>
    @endif

