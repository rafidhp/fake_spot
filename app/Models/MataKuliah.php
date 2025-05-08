<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliahs';
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'dosen_id',
    ];

    public function dosen() {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function studies() {
        return $this->belongsTo(Study::class);
    }
}
