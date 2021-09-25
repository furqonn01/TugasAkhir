<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanTambahan extends Model
{
    use HasFactory;
    protected $table = 'jabatan_tambahan';

    public function riwayatTambahan()
    {
        return $this->belongsTo(RiwayatTambahan::class, 'kode_tambahan', 'id_tambahan');
    }
}
