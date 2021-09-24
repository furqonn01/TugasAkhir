<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    protected $table = 'tm_gol';

    public function pegawai()
    {
        return $this->belongsTo('App\Models\pegawai', 'kode_gol', 'id_gol');
    }
    public function golongan()
    {
        return $this->belongsTo('App\Models\Golongan', 'kode_gol', 'id_gol');
    }
}
