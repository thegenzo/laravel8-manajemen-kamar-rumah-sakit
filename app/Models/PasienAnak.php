<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienAnak extends Model
{
    use HasFactory;

    protected $table = 'pasien_anaks';

    protected $primaryKey = 'id';

    protected $fillable = ['nomor_pasien', 'nama_pasien', 'umur', 'ttl', 'alamat', 'jenis_kelamin', 'status_inap', 'nama_kepala_keluarga', 'diagnosa_masuk', 'jenis_pasien', 'id_kamar', 'id_dokter', 'gedung'];

    public function rekammedis_anak()
    {
        return $this->hasMany(RekamMedis::class);
    }

    public function diagnosa_anak()
    {
        return $this->hasMany(Diagnosa::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar', 'id');
    }
}
