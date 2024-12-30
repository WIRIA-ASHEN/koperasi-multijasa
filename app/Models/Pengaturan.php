<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;
    protected $table ='pengaturans';
    protected $fillable = ['waktu_pinjaman', 'max_pinjaman', 'jasa_pinjaman'];

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }
}
