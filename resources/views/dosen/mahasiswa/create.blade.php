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
    <div style="max-width: 99vw; display: flex; justify-content: space-between;">
        <div style="width: 45%">
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
        </div>
        <div style="height: 50vh; width: 1px; background-color: #000"></div>
        <div style="width: 55%; padding-left: 10px;">
            <h2>Tambah data mahasiswa menggunakan file csv</h2>
            <form action="{{ route('mahasiswa.import', ['dosen_id' => $dosen->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <a href="{{ route('mahasiswa.download_template') }}">Download template file csv</a>
                <p>Pastikan isi dan format data sesuai dengan template yang disediakan</p>

                <br><hr>

                <label for="semester_id">Semester</label>
                <select name="semester_id" required>
                    <option disabled selected>-- Pilih Semester --</option>
                    @foreach ($semesters as $semester)
                        <option value="{{ $semester->id }}">Semester {{ $semester->semester }} ({{ $semester->tahun_ajaran }})</option>
                    @endforeach
                </select>
                @error('semester_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror

                <br><br>

                <label for="file">Upload data mahasiswa (max: 5mb): </label>
                <input type="file" name="file" accept=".csv" required>
                @error('file')
                    <div style="color: red;">{{ $message }}</div>
                @enderror

                <br><br>

                <button type="submit">Tambah data mahasiswa</button>
            </form>
        </div>
    </div>
    <a href="{{ route('mahasiswa.index', ['dosen_id' => $dosen->id]) }}">Kembali</a>
</body>
</html>
