<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosaAnak extends Model
{
    use HasFactory;

    protected $table = 'diagnosa_anaks';

    protected $primaryKey = 'id';

    protected $fillable = ['id_pasien_anak', 'diagnosa_akhir', 'obat', 'status_pasien', 'rs_rujukan'];

    public function pasien_anak()
    {
        return $this->belongsTo(PasienAnak::class, 'id_pasien_anak');
    }
}
