<label for="id"></label>
<form action="{{ route( 'users.update', $user->id ) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="id" value="{{ $user->id }}" readonly>
    <input type="text" name="name" value="{{ $user->name }}">
    <input type="text" name="email" value="{{ $user->email }}">
    <input type="text" name="password" value="{{ $user->password }}" >
    <input type="text" name="password_confirmation" value="{{ $user->password }}" >
    <button type="submit"> update </button>
    {{session('success')}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
