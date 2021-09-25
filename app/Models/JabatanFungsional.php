<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanFungsional extends Model
{
    use HasFactory;
    protected $table = 'jabatan_fungsional';

    public function riwayatFungsional()
    {
        return $this->belongsTo('App\Models\RiwayatJabatan', 'kode_jabatan', 'id_jabatan');
    }
}
