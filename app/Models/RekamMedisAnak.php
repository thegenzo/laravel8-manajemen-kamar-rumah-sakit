<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedisAnak extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis_anaks';
    
    protected $primaryKey = 'id';

    protected $fillable = ['id_pasien', 'tensi_darah', 'suhu_tubuh', 'pernapasan', 'nadi', 'anamnesis', 'terapi'];

    public function pasien_anak()
    {
        return $this->belongsTo(PasienAnak::class, 'id_pasien_anak');
    }
}
