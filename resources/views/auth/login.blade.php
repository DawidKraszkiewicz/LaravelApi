<form action="{{route('auth.login.submit')}}" method="POST">
    @csrf
    <label>
        <input type="email" name="email">
    </label>
    <label>
        <input type="password" name="password">
    </label>
    <button type="submit">Login</button>
</form>
