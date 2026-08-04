<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventor extends Model
{
    // use HasFactory;
    protected $table = 'inventor';

    protected $fillable = [
        'id', 'id_user', 'p_nama', 'p_nik', 'alamat', 'p_foto_ktp', 'foto_diri', 'telepon', 'p_pekerjaan', 'p_pendidikan',
        'kategori', 'tipe', 'id_kel', 'id_kec', 'status_inventor',
        'k_lembaga', 'k_nama', 'k_ketua', 'k_anggota1', 'k_anggota2', 'k_anggota3', 'k_anggota4'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];

}
