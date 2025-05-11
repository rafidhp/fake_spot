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
    @if (Auth::check())
        <h2>Selamat datang {{ Auth::user()->username }}!</h2>
        <a href="{{ route('matkul.index') }}">Mata Kuliah</a>
        <br>
        <a href="{{ route('daftar_dosen.index') }}">Daftar Dosen</a>
        <br>
        <a href="{{ route('semester.index') }}">Semester</a>
        <br><br>
        <a href="{{ route('auth.logout') }}">Logout</a>
    @else
        Please login first
        <br>
        <a href="{{ route('auth.login') }}">Login</a>
    @endif
</body>
</html>
