<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function index() {
        $matkuls = MataKuliah::all();
        return view('admin.matkul.index', compact('matkuls'));
    }
    public function create() {
        $dosens = Dosen::all();
        return view('admin.matkul.create', compact('dosens'));
    }

    public function store(Request $request, $dosen_id) {
        $request->validate([
            'kode_mk' => 'required|max:5',
            'nama_mk' => 'required|string|max:50',
            'sks' => 'required|integer|min:1|max:4',
            'dosen_id' => 'required|exists:dosens,id',
        ], [
            'kode_mk.required' => 'Kode Mata Kuliah tidak boleh kosong',
            'kode_mk.max' => 'Kode Mata Kuliah maksimal 5 karakter',
            'nama_mk.required' => 'Nama Mata Kuliah tidak boleh kosong',
            'nama_mk.string' => 'Nama Mata Kuliah harus berupa string',
            'nama_mk.max' => 'Nama Mata Kuliah maksimal 50 karakter',
            'sks.required' => 'SKS tidak boleh kosong',
            'sks.integer' => 'SKS harus berupa angka',
            'sks.min' => 'SKS minimal 1',
            'sks.max' => 'SKS maksimal 4',
            'dosen_id.required' => 'Dosen tidak boleh kosong',
            'dosen_id.exists' => 'Dosen tidak ditemukan',
        ]);

        MataKuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'dosen_id' => $request->dosen_id,
        ]);

        return redirect()->route('matkul.index')->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    public function edit($matkul_id) {
        $matkul = MataKuliah::where('id', $matkul_id)->first();
        $dosens = Dosen::all();
        return view('admin.matkul.edit', compact('matkul', 'dosens'));
    }

    public function update(Request $request, $matkul_id) {
        $request->validate([
            'kode_mk' => 'required|max:5',
            'nama_mk' => 'required|string|max:50',
            'sks' => 'required|integer|min:1|max:4',
            'dosen_id' => 'required|exists:dosens,id',
        ], [
            'kode_mk.required' => 'Kode Mata Kuliah tidak boleh kosong',
            'kode_mk.max' => 'Kode Mata Kuliah maksimal 5 karakter',
            'nama_mk.required' => 'Nama Mata Kuliah tidak boleh kosong',
            'nama_mk.string' => 'Nama Mata Kuliah harus berupa string',
            'nama_mk.max' => 'Nama Mata Kuliah maksimal 50 karakter',
            'sks.required' => 'SKS tidak boleh kosong',
            'sks.integer' => 'SKS harus berupa angka',
            'sks.min' => 'SKS minimal 1',
            'sks.max' => 'SKS maksimal 4',
            'dosen_id.required' => 'Dosen tidak boleh kosong',
            'dosen_id.exists' => 'Dosen tidak ditemukan',
        ]);

        $matkul = MataKuliah::where('id', $matkul_id)->first();

        $matkul->update([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'dosen_id' => $request->dosen_id,
        ]);

        return redirect()->route('matkul.index')->with('success', 'Mata Kuliah berhasil diupdate');
    }

    public function destroy($matkul_id) {
        $matkul = MataKuliah::where('id', $matkul_id)->first();
        $matkul->delete();

        return redirect()->route('matkul.index')->with('success', 'Mata Kuliah berhasil dihapus');
    }
}
