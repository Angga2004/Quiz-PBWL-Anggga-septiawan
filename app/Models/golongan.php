<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'tb_golongan'; // Nama tabel

    protected $primaryKey = 'gol_id'; // Nama primary key

    // Definisikan kolom yang dapat diisi
    protected $fillable = ['gol_kode', 'gol_nama'];

    // Menentukan tipe data pada kolom tertentu (misalnya timestamp)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
