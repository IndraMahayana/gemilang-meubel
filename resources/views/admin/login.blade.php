<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <h1>Login Admin</h1>

    @if($errors->any())
        <p style="color:red">{{ $errors->first('login') }}</p>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <p>Email: <input type="email" name="email" required></p>
        <p>Password: <input type="password" name="password" required></p>
        <button type="submit">Login</button>
    </form>
</body>
</html>
