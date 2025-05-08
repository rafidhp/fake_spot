<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $table = 'studies';
    protected $fillable = [
        'mahasiswa_id',
        'mata_kuliah_id',
        'semester_id',
    ];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function mataKuliah() {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    public function semester() {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function nilai() {
        return $this->belongsTo(Nilai::class);
    }
}
