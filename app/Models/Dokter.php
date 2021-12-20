<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokters';

    protected $primaryKey = 'id';

    protected $fillable = ['nama_dokter', 'spesialis', 'jadwal', 'status'];

    public function pasien()
    {
        return $this->hasMany(Pasien::class, 'id_dokter');
    }

    public function pasien_anak()
    {
        return $this->hasMany(PasienAnak::class, 'id_dokter');
    }
}
