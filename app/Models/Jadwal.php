<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal',
        'kegiatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
