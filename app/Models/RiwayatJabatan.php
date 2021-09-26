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
        return $this->hasMany(Pegawai::class, 'nip_baru', 'nip');
    }
    public function jabatanFungsional()
    {
        return $this->hasMany(JabatanFungsional::class, 'id_jabatan', 'kode_jabatan');
    }
}
