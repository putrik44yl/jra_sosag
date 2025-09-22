<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    use HasFactory;

    protected $table = 'sarana';           
    protected $primaryKey = 'id_sarana';   
    public $incrementing = true;           
    protected $keyType = 'int';            

    protected $fillable = [
        'nama_sarana',
        'jumlah',
        'kondisi',
        'keterangan',
    ];

   
    public function penggunaSarana()
    {
        return $this->hasMany(PenggunaSarana::class, 'id_sarana', 'id_sarana');
    }
}
