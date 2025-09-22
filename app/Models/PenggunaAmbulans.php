<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaAmbulans extends Model
{
    use HasFactory;

    protected $table = 'pengguna_ambulans';          
    protected $primaryKey = 'id_pengguna_ambulans';  
    public $incrementing = true;                     
    protected $keyType = 'int';                      

    protected $fillable = [
        'id_ambulans',
        'id_user',
        'id_anggota',
        'tgl_penggunaan',
        'tujuan',
        'status',
    ];

    
    public function ambulans()
    {
        return $this->belongsTo(Ambulans::class, 'id_ambulans', 'id_ambulans');
    }

    
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }

    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
