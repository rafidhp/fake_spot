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
    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif
    @foreach ($matkuls as $matkul)
        <table>
            <tr>
                <th>No</th>
                <th>Kode Mata kuliah</th>
                <th>Nama Mata kuliah</th>
                <th>SKS</th>
                <th>Dosen</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $matkul->kode_mk }}</td>
                <td>{{ $matkul->nama_mk }}</td>
                <td>{{ $matkul->sks }}</td>
                <td>{{ $matkul->dosen->nama }}</td>
                <td>
                    <a href="{{ route('matkul.edit', ['matkul_id' => $matkul->id]) }}">Edit</a>
                    <a href="{{ route('matkul.destroy', ['matkul_id' => $matkul->id]) }}">Hapus</a>
                </td>
            </tr>
        </table>
        <br>
        <a href="{{ route('matkul.create') }}">Buat matkul</a>
        <br>
        <a href="{{ route('admin.dashboard') }}">Kembali</a>
    @endforeach
</body>
</html>
