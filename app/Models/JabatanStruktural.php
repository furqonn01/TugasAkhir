<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanStruktural extends Model
{
    use HasFactory;
    protected $table = 'jabatan_struktural';
    public function riwayatStruktural()
    {
        return $this->belongsTo(RiwayatJabatanStruktural::class, 'kode_struktural', 'id_struktural');
    }
}
