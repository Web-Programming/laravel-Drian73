<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    //jika nama tabel berbeda
    protected $table = 'mahasiswas';

    //mengatur kolom yang boleh diisi saat mass insert
    protected $fillable = ['npm', 'nama', 'tempat_lahir', 'tanggal_lahir'];

    //mengatur kolom yang tidak boleh diisi
    protected $guard = [];
}
