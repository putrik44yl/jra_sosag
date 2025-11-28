<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota_jra';
    protected $primaryKey = 'id_anggota'; 
    public $incrementing = true;          
    protected $keyType = 'int';           

    protected $fillable = [
        'nama',
        'no_telp',
        'alamat',
        'tgl_daftar',
        'bln_daftar',
        'status_keaktifan',
        'status_keanggotaan',
        'foto',
    ];

    /**
     * Relasi ke Pengguna Ambulans.
     */
    public function penggunaAmbulans()
    {
        return $this->hasMany(PenggunaAmbulans::class, 'id_anggota', 'id_anggota');
    }

    /**
     * Relasi ke Pengguna Sarana.
     */
    public function penggunaSarana()
    {
        return $this->hasMany(PenggunaSarana::class, 'id_anggota', 'id_anggota');
    }
}
