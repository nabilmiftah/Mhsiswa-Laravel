<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Kolom apa saja yang boleh diisi melalui form
    protected $fillable = ['nim', 'nama', 'jurusan_id'];

    // Relasi: 1 Mahasiswa dimiliki oleh 1 Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}