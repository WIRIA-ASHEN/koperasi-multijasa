<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pinjaman;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $anggotaCount = Anggota::count();
        $simpananSum = Simpanan::sum('besar_simpanan');
        $totalHasilBagi = Pinjaman::sum('hasil_bagi');

        return view('dashboard.index',  compact('anggotaCount', 'simpananSum', 'totalHasilBagi'));
        // ['anggotaCount' => $anggotaCount], ['simpananSum' => $simpananSum],
    }
}
