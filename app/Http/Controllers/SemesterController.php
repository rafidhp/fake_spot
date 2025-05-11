<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends Controller
{
    public function index() {
        $semesters = Semester::orderBy('tahun_ajaran', 'asc')
                            ->orderBy('semester', 'asc')
                            ->get();
        return view('admin.semester.index', compact('semesters'));
    }

    public function create() {
        return view('admin.semester.create');
    }

    public function store(Request $request) {
        $request->validate([
            'semester' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:255',
        ], [
            'semester.required' => 'Semester is required.',
            'semester.string' => 'Semester must be a string.',
            'semester.max' => 'Semester must not exceed 255 characters.',
            'tahun_ajaran.required' => 'Tahun Ajaran is required.',
            'tahun_ajaran.string' => 'Tahun Ajaran must be a string.',
            'tahun_ajaran.max' => 'Tahun Ajaran must not exceed 255 characters.',
        ]);

        Semester::create($request->all());

        return redirect()->route('semester.index')->with('success', 'Semester created successfully.');
    }

    public function edit($semester_id) {
        $semester = Semester::findOrFail($semester_id);
        return view('admin.semester.edit', compact('semester'));
    }

    public function update(Request $request, $semester_id) {
        $request->validate([
            'semester' => 'required|numeric|max:16',
            'tahun_ajaran' => 'required|numeric',
        ], [
            'semester.required' => 'Semester is required.',
            'semester.numeric' => 'Semester must be a number.',
            'semester.max' => 'Semester must be 16 digits.',
            'tahun_ajaran.required' => 'Tahun Ajaran is required.',
            'tahun_ajaran.numeric' => 'Tahun Ajaran must be a number.',
        ]);

        $semester = Semester::findOrFail($semester_id);
        $semester->update($request->all());

        return redirect()->route('semester.index')->with('success', 'Semester updated successfully.');
    }

    public function destroy($semester_id) {
        $semester = Semester::findOrFail($semester_id);
        $semester->delete();

        return redirect()->route('semester.index')->with('success', 'Semester deleted successfully.');
    }
}
