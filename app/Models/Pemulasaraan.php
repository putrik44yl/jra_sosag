<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemulasaraan extends Model
{
    use HasFactory;

    protected $table = 'pemulasaraan';       
    protected $primaryKey = 'id_pemulasaraan';   
    public $incrementing = true;                 
    protected $keyType = 'int';                  

    protected $fillable = [
        'nama_almarhum',
        'tgl_permintaan',
        'tgl_pemulasaraan',
        'status',
        'lokasi',
        'keterangan',
    ];
}
