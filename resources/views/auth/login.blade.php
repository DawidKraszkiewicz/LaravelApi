<form action="{{route('auth.login.submit')}}" method="POST">
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email">
    <label for="password">Password</label>
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>
