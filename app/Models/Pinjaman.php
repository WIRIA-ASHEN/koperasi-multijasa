<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjamans';
    protected $fillable = ['id_anggota', 'tgl_pinjaman', 'besar_pinjaman', 'bagi_hasil', 'jangka_waktu', 'bayar_pokok', 'hasil_bagi', 'bayar_perbulan', 'total', 'keterangan', 'user_id'];

    public function anggotas()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id');
    }

    public function pengaturans()
    {
        return $this->belongsTo(Pengaturan::class);
    }

    public function bayar_pinjaman()
    {
        return $this->hasMany(BayarPinjaman::class, 'id_pinjaman', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
