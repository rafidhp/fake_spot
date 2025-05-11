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
    <h1>Edit Mata Kuliah</h1>

    <form action="{{ route('matkul.update', ['matkul_id' => $matkul->id]) }}" method="POST">
        @csrf
        <label for="kode_mk">Kode Mata Kuliah</label>
        <input type="text" name="kode_mk" value="{{ $matkul->kode_mk }}" required>
        <br><br>
        <label for="nama_mk">Nama Mata Kuliah</label>
        <input type="text" name="nama_mk" value="{{ $matkul->nama_mk }}" required>
        <br><br>
        <label for="sks">SKS</label>
        <input type="number" name="sks" value="{{ $matkul->sks }}" required>
        <br><br>
        <label for="dosen_id">Dosen Pengampu</label>
        <select name="dosen_id" id="dosen_id" required>
            <option disabled>Pilih Dosen</option>
            @foreach ($dosens as $dosen)
                <option value="{{ $dosen->id }}" {{ $matkul->dosen_id == $dosen->id ? 'selected' : '' }}>{{ $dosen->nama }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Update Mata Kuliah</button>
    </form>
</body>
</html>
