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
    <h1>Buat data Mata Kuliah</h1>

    <form action="{{ route('matkul.store') }}" method="post">
        @csrf
        <label for="kode_mk">Kode Mata Kuliah</label>
        <input type="text" name="kode_mk" required>
        <br><br>
        <label for="nama_mk">Nama Mata Kuliah</label>
        <input type="text" name="nama_mk" required>
        <br><br>
        <label for="sks">SKS</label>
        <input type="number" name="sks" required>
        <br><br>
        <label for="dosen_id">Dosen Pengampu</label>
        <select name="dosen_id" id="dosen_id" required>
            <option disabled selected>Pilih Dosen</option>
            @foreach ($dosens as $dosen)
                <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Buat Mata Kuliah</button>
    </form>
</body>
</html>
