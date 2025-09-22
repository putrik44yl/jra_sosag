<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulans extends Model
{
    use HasFactory;

    protected $table = 'ambulans';        
    protected $primaryKey = 'id_ambulans';
    public $incrementing = true;          
    protected $keyType = 'int';           

    protected $fillable = [
        'id_anggota',
        'nama',
        'plat',
        'tujuan',
        'status',
    ];

   
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }

    
    public function penggunaAmbulans()
    {
        return $this->hasMany(PenggunaAmbulans::class, 'id_ambulans', 'id_ambulans');
    }
}
