<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'alamat',
        'no_hp',
        'tanggal_lahir',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
