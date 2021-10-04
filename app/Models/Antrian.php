<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $table = 'antrians';

    protected $primaryKey = 'id';

    protected $fillable = ['nama_pasien', 'umur', 'ttl', 'alamat', 'no_hp', 'jenis_kelamin', 'status_inap', 'nama_kepala_keluarga', 'diagnosa_masuk', 'jenis_pasien'];
}
