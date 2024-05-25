<form action="{{route('auth.login.submit')}}" method="POST">
    @csrf
    <input type="email" name="email">
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>
