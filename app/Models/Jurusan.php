<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    // Mengizinkan pengisian data massal untuk kolom nama_jurusan
    protected $fillable = ['nama_jurusan'];

    // Relasi: 1 Jurusan memiliki banyak Mahasiswa
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
