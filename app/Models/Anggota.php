<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggotas';

    protected $fillable = [
        'nama',
        'nik',
        'tmpt_lahir',
        'tgl_lahir',
        'alamat',
        'no_telp',
        'user_id'
      ];

    public function simpanans()
    {
      return $this->hasMany(Simpanan::class);
    }

    public function jenissimpanan()
    {
      return $this->hasMany(JenisSimpanan::class);
    }

    public function pinjamans()
    {
      return $this->hasMany(Pinjaman::class, 'id_anggota', 'id');
    }

    public function bayar_pinjaman()
    {
      return $this->hasMany(BayarPinjaman::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
