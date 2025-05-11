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
        <h2>Selamat datang {{ $dosen->nama }}!</h2>
        <br>
        <a href="{{ route('mahasiswa.index', ['dosen_id' => $dosen->id]) }}">Daftar Mahasiswa</a>
        <br><br>
        <a href="{{ route('auth.logout') }}">Logout</a>
    @else
        Please login first
        <br>
        <a href="{{ route('auth.login') }}">Login</a>
    @endif
</body>
</html>
