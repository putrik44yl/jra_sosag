<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaSarana extends Model
{
    use HasFactory;

    protected $table = 'pengguna_sarana';     
    protected $primaryKey = 'id_pengguna';    
    public $incrementing = true;              
    protected $keyType = 'int';               

    protected $fillable = [
        'id_anggota',
        'id_sarana',
        'tanggal_pakai',
        'keterangan',
    ];

    
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }

    
    public function sarana()
    {
        return $this->belongsTo(Sarana::class, 'id_sarana', 'id_sarana');
    }
}
