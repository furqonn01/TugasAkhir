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
        return $this->hasOne('App\Models\pegawai', 'nip_baru', 'nip');
    }
    public function jabatanTambahan()
    {
        return $this->hasOne('App\Models\JabatanTambahan', 'id_tambahan', 'kode_tambahan');
    }
}
