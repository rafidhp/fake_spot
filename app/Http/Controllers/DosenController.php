<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\User;

class DosenController extends Controller
{
    public function index($dosen_id) {
        $dosen = Dosen::where('id', $dosen_id)->first();
        return view('dosen.dashboard', compact('dosen'));
    }

    public function daftar_dosen() {
        $dosens = Dosen::all();
        return view('admin.daftar_dosen.index', compact('dosens'));
    }

    public function destroy($dosen_id) {
        $dosen = Dosen::where('id', $dosen_id)->first();
        $user_id = $dosen->user_id;
        $user = User::where('id', $user_id)->first();

        $dosen->delete();
        $user->delete();

        return redirect()->route('daftar_dosen.index')->with('success', 'Dosen berhasil dihapus');
    }
}
