<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    use HasFactory;

    protected $table = 'perawats';

    protected $primaryKey = 'id';

    protected $fillable = ['id_user', 'nip', 'staf_gedung', 'no_hp', 'alamat'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
