<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $table = 'diagnosas';

    protected $primaryKey = 'id';

    protected $fillable = ['id_pasien', 'diagnosa_akhir', 'obat', 'status_pasien', 'rs_rujukan'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
}
