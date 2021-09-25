<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTambahan extends Model
{
    use HasFactory;
    protected $table = 'riwayat_tambahan';


    public function pegawai()
    {
        return $this->hasMany('App\Models\pegawai', 'nip', 'nip_baru');
    }
    public function jabatanTambahan()
    {
        return $this->hasMany('App\Models\JabatanTambahan', 'kode_tambahan', 'id_tambahan');
    }
}
