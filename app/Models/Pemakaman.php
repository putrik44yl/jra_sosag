<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemakaman extends Model
{
    protected $table = 'pemakaman'; 
    protected $fillable = [
        'blok',
        'nama_almarhum',
        'tempat_tanggal_lahir',
        'tanggal_meninggal',
        'keluarga_almarhum',
        'keterangan',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

