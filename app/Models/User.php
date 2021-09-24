<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'nip', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'nip', 'nip_baru');
    }
}
