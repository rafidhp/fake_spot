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
    <h2>Daftar Mahasiswa</h2>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <table>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th>Action</th>
        </tr>
        @foreach ($studies as $study)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $study->mahasiswa->nim }}</td>
                <td>{{ $study->mahasiswa->nama }}</td>
                <td>{{ $study->semester->semester }}</td>
                <td>{{ $study->semester->tahun_ajaran }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', ['study_id' => $study->id]) }}">Edit</a>
                    <a href="{{ route('mahasiswa.destroy', ['study_id' => $study->id]) }}">Hapus</a>
                </td>
            </tr>
        @endforeach
        @empty($study)
            <tr>
                <td colspan="100%" style="text-align: center;">Tidak ada data mahasiswa</td>
            </tr>
        @endempty
    </table>
    <br>
    <a href="{{ route('mahasiswa.create', ['dosen_id' => $dosen->id]) }}">Tambah Mahasiswa</a>
    <br><br>
    <a href="{{ route('dosen.dashboard', ['dosen_id' => $dosen->id]) }}">Kembali</a>
</body>
</html>
