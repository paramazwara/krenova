<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inovasi extends Model
{
    protected $table = 'inovasi';

    protected $fillable = [
        'id_inventor', 'id_kategori', 'id_tahun', 'id_bidang', 'inovasi_status',
        'nama_inovasi', 'instansi_nama', 'instansi_alamat', 'tahap_inovasi',

        'proposal_abstrak', 'proposal_latar_belakang', 'proposal_maksud_tujuan', 'proposal_manfaat', 'proposal_keunggulan', 'proposal_aspek', 'proposal_penerapan', 'proposal_rab',

        'f_profil_bisnis', 'f_foto_produk1', 'f_foto_produk2', 'f_foto_produk3',
        'f_foto_kegiatan1', 'f_foto_kegiatan2', 'f_keaslian_temuan', 'f_url_video'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];
}
