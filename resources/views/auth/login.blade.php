<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fake Spot</title>

    <link rel="shortcut icon" href="{{ asset('assets/icon/upi.png') }}" type="image/x-icon">
</head>
<body>
    <form action="{{ route('auth.authorization') }}" method="post">
        @csrf
        <input type="text" name="username" placeholder="Masukkan username" required>
        <input type="password" name="password" placeholder="Masukkan password" required>
        <button type="submit">Login</button>
    </form>
    @if ($errors->has('username'))
        <div style="color: red;">{{ $errors->first('username') }}</div>
    @elseif (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <p>Dont have an account?</p>
    <a href="{{ route('auth.register') }}">Register</a>
</body>
</html>
