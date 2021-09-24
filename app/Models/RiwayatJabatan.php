<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatJabatan extends Model
{
    use HasFactory;
    protected $table = 'riwayat_jabatan';

    public function pegawai()
    {
        return $this->hasMany('App\Models\pegawai', 'nip', 'nip_baru');
    }
    public function jabatanFungsional()
    {
        return $this->hasMany(JabatanStruktural::class, 'kode_jabatan', 'id_jabatan');
    }
}
