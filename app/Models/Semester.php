<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';
    protected $fillable = [
        'semester',
        'tahun_ajaran',
    ];

    public function studies() {
        return $this->belongsTo(Study::class);
    }
}
