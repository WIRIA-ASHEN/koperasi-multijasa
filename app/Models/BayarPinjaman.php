<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BayarPinjaman extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'bayar_pinjaman';
    protected $primaryKey = 'id';

    protected $fillable = ['id_pinjaman', 'jatuh_tempo', 'tanggal_bayar', 'nominal', 'denda', 'status'];

    protected $dates = ['deleted_at'];

    public function pinjamans()
    {
        return $this->belongsTo(Pinjaman::class, 'id_pinjaman');
    }
    public function anggotas()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
