<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index($dosen_id) {
        $dosen = Dosen::where('id', $dosen_id)->first();
        return view('dosen.dashboard', compact('dosen'));
    }
}
