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
    <h2>Daftar Dosen</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Dosen</th>
            <th>Username</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>Action</th>
        </tr>
        @foreach ($dosens as $dosen)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dosen->nama }}</td>
                <td>{{ $dosen->user->username }}</td>
                <td>{{ $dosen->user->email }}</td>
                <td>
                    @if($dosen->jenis_kelamin == 'L')
                        Laki-laki
                    @elseif($dosen->jenis_kelamin == 'P')
                        Perempuan
                    @endif
                </td>
                <td>
                    <a href="{{ route('dosen.destroy', ['dosen_id' => $dosen->id]) }}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
    @if(@session('success'))
       <p style="color: green">{{ session('success') }}</p>
    @endif
    <br>
    <a href="{{ route('admin.dashboard') }}">Kembali</a>
</body>
</html>
