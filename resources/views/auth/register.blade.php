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
        <input type="text" name="username" placeholder="Masukkan username" required>
        <input type="email" name="email" placeholder="Masukkan email" required>
        <input type="password" name="password" placeholder="Masukkan password" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi password" required>
        <select name="jenis_kelamin">
            <option disabled selected>Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
