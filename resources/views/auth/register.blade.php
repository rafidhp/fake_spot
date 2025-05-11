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
    <form action="{{ route('auth.store') }}" method="post">
        @csrf
        <input type="text" name="nama" placeholder="Masukkan nama" required>
        @error('nama')
            <div style="color: red">{{ $message }}</div>
        @enderror
        <input type="text" name="username" placeholder="Masukkan username" required>
        @error('username')
            <div style="color: red">{{ $message }}</div>
        @enderror
        <input type="email" name="email" placeholder="Masukkan email" required>
        @error('email')
            <div style="color: red">{{ $message }}</div>
        @enderror
        <input type="password" name="password" placeholder="Masukkan password" required>
        @error('password')
            <div style="color: red">{{ $message }}</div>
        @enderror
        <input type="password" name="password_confirmation" placeholder="Konfirmasi password" required>
        @error('password_confirmation')
            <div style="color: red">{{ $message }}</div>
        @enderror
        <select name="jenis_kelamin">
            <option disabled selected>Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        @error('jenis_kelamin')
            <div style="color: red">{{ $message }}</div>
        @enderror
        <br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
