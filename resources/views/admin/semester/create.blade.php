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
    <h2>Buat Data Semester</h2>
    <form action="{{ route('semester.store') }}" method="post">
        @csrf
        <label for="semester">Semester</label>
        <input type="number" name="semester" min="1" max="4" required>
        <br><br>
        <label for="tahun_ajaran">Tahun Ajaran</label>
        <select name="tahun_ajaran" required>
            <option disabled selected>Pilih tahun ajaran</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
        </select>
        <br><br>
        <button type="submit">Tambah Semester</button>
    </form>
    <br>
    <a href="{{ route('semester.index') }}">Kembali</a>
</body>
</html>
