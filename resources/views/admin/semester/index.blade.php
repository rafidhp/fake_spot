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
    <h2>Data Semester</h2>
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <table>
        <tr>
            <th>No</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th>Action</th>
        </tr>
        @foreach ($semesters as $semester)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $semester->semester }}</td>
                <td>{{ $semester->tahun_ajaran }}</td>
                <td>
                    <a href="{{ route('semester.edit', ['semester_id' => $semester->id]) }}">Edit</a>
                    <a href="{{ route('semester.destroy', ['semester_id' => $semester->id]) }}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="{{ route('semester.create') }}">Tambah Semester</a>
    <br><br>
    <a href="{{ route('admin.dashboard') }}">Kembali</a>
</body>
</html>
