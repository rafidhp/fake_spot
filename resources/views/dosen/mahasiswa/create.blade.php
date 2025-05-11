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
    <h2>Tambah Data Mahasiswa</h2>
    <form action="{{ route('mahasiswa.store', ['dosen_id' => $dosen->id]) }}" method="post">
        @csrf
        <label for="nim">NIM</label>
        <input type="number" name="nim" placeholder="NIM" required>
        @error('nim')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>
        <label for="nama">Nama Mahasiswa</label>
        <input type="text" name="nama" placeholder="Nama mahasiswa" required>
        @error('nama')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>
        <label for="semester">Semester</label>
        <select name="semester_id" required>
            <option disabled selected>Pilih Semester</option>
            @foreach ($semesters as $semester)
                <option value="{{ $semester->id }}">Semester {{ $semester->semester }} ({{ $semester->tahun_ajaran }})</option>
            @endforeach
        </select>
        @error('semester_id')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>
        <button type="submit">Tambah Mahasiswa</button>
    </form>
    <br>
    <a href="{{ route('mahasiswa.index', ['dosen_id' => $dosen->id]) }}">Kembali</a>
</body>
</html>
