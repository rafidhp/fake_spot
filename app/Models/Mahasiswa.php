<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $fillable = [
        'nama',
        'nim',
        // 'user_id',
    ];

    // public function user() {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function studies() {
        return $this->belongsTo(Study::class);
    }
}
