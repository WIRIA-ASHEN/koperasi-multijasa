<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSimpanan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_simpanan', 'min_simpanan'];

    public function simpanan()
    {
        return $this->hasMany(Simpanan::class);
    }
}
