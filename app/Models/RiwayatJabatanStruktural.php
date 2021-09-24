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
        return $this->hasMany('App\Models\pegawai', 'nip', 'nip_baru');
    }
    public function jabatanStruktural()
    {
        return $this->hasMany(JabatanStruktural::class, 'kode_struktural', 'id_struktural');
    }
}
