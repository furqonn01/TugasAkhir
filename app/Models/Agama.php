<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    protected $table = 'tm_agama';

    public function pegawai()
    {
        return $this->belongsTo('App\Models\pegawai', 'kode_agama', 'id_agama');
    }
}
