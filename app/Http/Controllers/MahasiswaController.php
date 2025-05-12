<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Study;
use App\Models\Semester;

class MahasiswaController extends Controller
{
    public function index($dosen_id) {
        $dosen = Dosen::findOrFail($dosen_id);
        $mahasiswa_list = Study::whereHas('mataKuliah', function ($query) use ($dosen_id) {
            $query->where('dosen_id', $dosen_id);
        })
        ->with('mahasiswa') // eager load mahasiswa
        ->get()
        ->pluck('mahasiswa')
        ->unique('id');

        $studies = Study::whereHas('mataKuliah', function ($query) use ($dosen_id) {
            $query->where('dosen_id', $dosen_id);
        })->with(['mataKuliah', 'mahasiswa', 'semester'])->get();

        return view('dosen.mahasiswa.index', compact('mahasiswa_list', 'dosen', 'studies'));
    }

    public function create($dosen_id) {
        $dosen = Dosen::findOrFail($dosen_id);
        $semesters = Semester::orderBy('tahun_ajaran', 'asc')
                            ->orderBy('semester', 'asc')
                            ->get();
        return view('dosen.mahasiswa.create', compact('dosen', 'semesters'));
    }

    public function download_template() {
        $file = storage_path('app/download/template-data-mahasiswa.csv');
        return response()->download($file);
    }

    public function import(Request $request, $dosen_id) {
        $request->validate([
            'semester_id' => 'required|exists:semesters,id',
            'file' => 'required|max:5120',
        ], [
            'semester_id.required' => 'Semester harus dipilih.',
            'semester_id.exists' => 'Semester tidak valid.',
            'file.required' => 'File harus diunggah.',
            'file.mimes' => 'File harus berupa file CSV.',
            'file.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
        ]);

        $file = $request->file('file');
        $file_content = file($file->getPathname());

        $skip_first_line = true;

        foreach($file_content as $line) {

            if($skip_first_line) {
                $skip_first_line = false;
                continue;
            }

            $data = explode(';', $line);
            $data = array_map('trim', $data);

            $new_mahasiswa = Mahasiswa::create([
                'nama' => $data[1],
                'nim' => $data[0],
            ]);

            $mata_kuliah_id = MataKuliah::where('dosen_id', $dosen_id)->pluck('id');

            Study::create([
                'mahasiswa_id' => $new_mahasiswa->id,
                'mata_kuliah_id' => $mata_kuliah_id[0],
                'semester_id' => $request->semester_id,
            ]);
        }

        return redirect()->route('mahasiswa.index', ['dosen_id' => $dosen_id])->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function store(Request $request, $dosen_id) {
        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim|min_digits:7|max_digits:7',
            'nama' => 'required|string|max:255',
            'semester_id' => 'required|exists:semesters,id',
        ], [
            'nim.required' => 'NIM harus diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'nim.min_digits' => 'NIM harus terdiri dari 7 digit.',
            'nim.max_digits' => 'NIM harus terdiri dari 7 digit.',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'semester_id.required' => 'Semester harus dipilih.',
            'semester_id.exists' => 'Semester tidak valid.',
        ]);

        $new_mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
        ]);

        $mata_kuliah_id = MataKuliah::where('dosen_id', $dosen_id)->pluck('id');

        Study::create([
            'mahasiswa_id' => $new_mahasiswa->id,
            'mata_kuliah_id' => $mata_kuliah_id[0],
            'semester_id' => $request->semester_id,
        ]);

        return redirect()->route('mahasiswa.index', ['dosen_id' => $dosen_id])->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit($study_id) {
        $study = Study::where('id', $study_id)->first();
        $semesters = Semester::orderBy('tahun_ajaran', 'asc')
                            ->orderBy('semester', 'asc')
                            ->get();

        return view('dosen.mahasiswa.edit', compact('study', 'semesters'));
    }

    public function update(Request $request, $study_id) {
        $request->validate([
            'nim' => 'required|numeric|min_digits:7|max_digits:7',
            'nama' => 'required|string|max:255',
            'semester_id' => 'required|exists:semesters,id',
        ], [
            'nim.required' => 'NIM harus diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.min_digits' => 'NIM harus terdiri dari 7 digit.',
            'nim.max_digits' => 'NIM harus terdiri dari 7 digit.',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'semester_id.required' => 'Semester harus dipilih.',
            'semester_id.exists' => 'Semester tidak valid.',
        ]);

        $study = Study::where('id', $study_id)->first();
        $mahasiswa = Mahasiswa::where('id', $study->mahasiswa_id)->first();

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
        ]);

        $study->update([
            'semester_id' => $request->semester_id,
        ]);

        return redirect()->route('mahasiswa.index', ['dosen_id' => $study->mataKuliah->dosen_id])->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy($study_id) {
        $study = Study::where('id', $study_id)->first();
        $mahasiswa = Mahasiswa::where('id', $study->mahasiswa_id)->first();

        $study->delete();
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index', ['dosen_id' => $study->mataKuliah->dosen_id])->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
