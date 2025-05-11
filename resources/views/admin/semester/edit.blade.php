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
    <h2>Edit Data Semester</h2>
    <form action="{{ route('semester.update', ['semester_id' => $semester->id]) }}" method="post">
        @csrf
        <label for="semester">Semester</label>
        <input type="number" name="semester" min="1" max="4" value="{{ $semester->semester }}" required>
        @error('semester')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>
        <label for="tahun_ajaran">Tahun Ajaran</label>
        <select name="tahun_ajaran" required>
            <option disabled selected>Pilih tahun ajaran</option>
            @foreach (range(2015, 2026) as $year)
                <option value="{{ $year }}" {{ $semester->tahun_ajaran == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endforeach
        </select>
        @error('tahun_ajaran')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>
        <button type="submit">Edit Semester</button>
    </form>
    <br>
    <a href="{{ route('semester.index') }}">Kembali</a>
</body>
</html>
