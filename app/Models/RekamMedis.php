<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';

    protected $primaryKey = 'id';

    protected $fillable = ['id_pasien', 'tensi_darah', 'suhu_tubuh', 'pernapasan', 'nadi', 'anamnesis', 'terapi'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
