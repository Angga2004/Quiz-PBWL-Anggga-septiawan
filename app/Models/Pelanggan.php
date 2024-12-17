<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model
    protected $table = 'tb_pelanggan';

    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'pel_id';

    // Tentukan kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = ['pel_id_gol', 'pel_no', 'pel_nama', 'pel_alamat'];

    // Menentukan relasi ke model Golongan (bila diperlukan)
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'pel_id_gol', 'gol_id');
    }
}
