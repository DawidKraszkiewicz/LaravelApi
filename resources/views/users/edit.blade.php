<label for="id"></label>
<form action="{{ route( 'users.update', $user->id ) }}"></form>
<input type="text" name="id" value="{{ $user->id }}" readonly>
<input type="text" name="name" value="{{ $user->name }}">
<input type="text" name="email" value="{{ $user->email }}">
<input type="text" name="password" value="{{ $user->password }}" readonly>
<button type="submit"> update </button>
