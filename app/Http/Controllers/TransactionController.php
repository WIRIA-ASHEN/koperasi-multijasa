<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pinjaman;
use App\Models\Simpanan;
use App\Models\BayarPinjaman;
use App\Exports\PinjamanExport;
use App\Exports\SimpananExport;
use Illuminate\Support\Facades\DB;
use App\Exports\BayarPinjamanExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;



class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = Simpanan::query();
        // dd($request->all())
        // Check if start_date and end_date are provided in the request
        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            // Add where clause to filter by date range
            $query->whereBetween('tgl_simpanan', [$start_date, $end_date]);
        }

        // Get the filtered results
        $simpanans = $query->get();

        // Recalculate the totalSimpanan for the filtered data
        $totalSimpanan = $simpanans->sum('besar_simpanan');

        // // Get the filtered results
        // $simpanans = $query->get();

        // $simpanans = Simpanan::all();
        // $totalSimpanan = Simpanan::sum('besar_simpanan');

        return view('laporan.index', compact( 'simpanans','totalSimpanan'));
    }
    public function index_pinjaman(Request $request)
    {
        $query = Pinjaman::query();
        // dd($request->all())
        // Check if start_date and end_date are provided in the request
        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            // Add where clause to filter by date range
            $query->whereBetween('tgl_pinjaman', [$start_date, $end_date]);
        }

        // Get the filtered results
        $pinjamans = $query->get();

        // $pinjamans = Pinjaman::all();
        $totalPinjam = $pinjamans->sum('besar_pinjaman');

        return view('laporan.index-pinjaman', compact('pinjamans',  'totalPinjam'));
    }
    public function index_angsuran(Request $request)
    {
        $query = BayarPinjaman::query();
        // dd($request->all())
        // Check if start_date and end_date are provided in the request
        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            // Add where clause to filter by date range
            $query->whereBetween('tanggal_bayar', [$start_date, $end_date]);
        }

        // Get the filtered results
        $bayar_pinjaman = $query->get();

        // $pinjamans = Pinjaman::all();
        $totalAngsuran = $bayar_pinjaman->sum('nominal');

        // $bayar_pinjaman = BayarPinjaman::all();
        // $totalAngsuran = BayarPinjaman::sum('nominal');

        return view('laporan.index-angsuran', compact('bayar_pinjaman', 'totalAngsuran'));
    }

    public function export_simpanan(Request $request)
    {
        $start_date = ($request->start_date) ? $request->start_date : null;
        $end_date = ($request->end_date) ? $request->end_date : null;
        $simpanans = Simpanan::all();
        $totalSimpanan = Simpanan::sum('besar_simpanan');

        return Excel::download(new SimpananExport($start_date, $end_date), 'laporan_transaksi_simpanan.xlsx');
    }
    public function export_pinjaman(Request $request)
    {
        $start_date = ($request->start_date) ? $request->start_date : null;
        $end_date = ($request->end_date) ? $request->end_date : null;
        $pinjaman = Pinjaman::all();
        $totalPinjam = Pinjaman::sum('besar_pinjaman');

        return Excel::download(new PinjamanExport($start_date, $end_date), 'laporan_transaksi_pinjaman.xlsx');
    }
    public function export_angsuran(Request $request)
    {
        $start_date = ($request->start_date) ? $request->start_date : null;
        $end_date = ($request->end_date) ? $request->end_date : null;
        $bayar_pinjaman = BayarPinjaman::all();
        $totalAngsuran = BayarPinjaman::sum('nominal');

        return Excel::download(new BayarPinjamanExport($start_date, $end_date), 'laporan_transaksi_angsuran.xlsx');
    }
    
}
