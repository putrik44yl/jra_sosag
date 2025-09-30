<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    public $timestamps = true;

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'user_id');
    }

    public function profil()
    {
        return $this->hasOne(Profil::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function jadwalls()
    {
        return $this->hasMany(Jadwall::class);
    }

}
