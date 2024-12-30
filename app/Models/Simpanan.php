<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;
    protected $fillable =['id_anggota', 'id_jenis_simpanan', 'tgl_simpanan', 'besar_simpanan', 'user_id'];

    public function anggotas()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }

    public function jenissimpanans()
    {
        return $this->belongsTo(JenisSimpanan::class, 'id_jenis_simpanan');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
