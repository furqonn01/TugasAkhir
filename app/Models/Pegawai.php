<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->age;
    }

    public function agama()
    {
        return $this->hasOne('App\Models\Agama', 'id_agama', 'kode_agama');
    }
    public function golongan()
    {
        return $this->hasOne('App\Models\Golongan', 'id_gol', 'kode_gol');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'nip', 'nip_baru');
    }
    public function riwayatStruktural()
    {
        return $this->belongsTo(RiwayatJabatanStruktural::class, 'nip', 'nip_baru');
    }
    public function riwayatJabatan()
    {
        return $this->belongsTo(RiwayatJabatan::class, 'nip', 'nip_baru');
    }
    public function pensiun()
    {
        return $this->belongsTo(Pensiun::class, 'nip', 'nip_baru');
    }
}
