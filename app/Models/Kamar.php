<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamars';

    protected $primaryKey = 'id';

    protected $fillable = ['nama_kamar', 'kelas', 'gedung', 'jumlah_kasur','status'];

    public function pasien()
    {
        return $this->hasMany(Pasien::class, 'id_kamar');
    }

    public function pasien_anak()
    {
        return $this->hasMany(PasienAnak::class, 'id_kamar');
    }
}   
