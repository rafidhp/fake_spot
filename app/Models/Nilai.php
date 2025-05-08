<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilais';
    protected $fillable = [
        'study_id',
        'point',
        'tugas',
        'pre_uts',
        'kuis',
        'uts',
        'pre_uas',
        'kuis',
        'uas',
        'IPK',
        'grade'
    ];

    public function studies() {
        return $this->belongsTo(Study::class, 'study_id');
    }
}
