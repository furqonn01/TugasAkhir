<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pensiun extends Model
{
    use HasFactory;
    protected $table = 'pensiun_meninggal';

    public function pegawai()
    {
        return $this->hasOne('App\Models\pegawai', 'nip', 'nip_baru');
    }
}
