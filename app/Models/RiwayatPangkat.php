<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPangkat extends Model
{
    use HasFactory;
    protected $table = 'riwayat_pangkat_golongan_ruang';
    
    public function pegawai(){
        return $this->hasOne('App\Models\pegawai');
    }
    public function golongan(){
        return $this->hasMany('App\Models\Golongan');
    }
}
