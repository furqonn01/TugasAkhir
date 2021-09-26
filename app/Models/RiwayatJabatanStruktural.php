<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatJabatanStruktural extends Model
{
    use HasFactory;
    protected $table = 'riwayat_struktural';

    public function pegawai()
    {
        return $this->hasOne('App\Models\pegawai', 'nip_baru', 'nip');
    }
    public function jabatanStruktural()
    {
        return $this->hasOne(JabatanStruktural::class, 'id_struktural', 'kode_struktural');
    }
}
