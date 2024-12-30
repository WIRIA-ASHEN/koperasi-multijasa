<?php

namespace App\Http\Controllers;

use \Carbon\Carbon;
use App\Models\Anggota;
use App\Models\Pinjaman;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use App\Models\BayarPinjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PinjamanController extends Controller
{
    public function index(Request $request)
    {
        // $anggotas = Anggota::all();
        // $pinjamans = Pinjaman::all();
    	// return view('pinjaman.index', compact('anggotas', 'pinjamans'));

        $query = Pinjaman::query()->latest();

        // Get search keyword and 'nik' from the request
        $keyword = $request->input('search');
        $nikKeyword = $request->input('search');
    
        // If a search keyword is provided, filter results based on 'nama'
        if ($keyword) {
            $pinjamans = $query->whereHas('anggotas', function ($query) use ($keyword) {
                $query->where('nama', 'LIKE', '%' . $keyword . '%');
            });
        }
    
        // If 'nik' keyword is provided, filter results based on 'nik'
        if ($nikKeyword) {
            $pinjamans = $query->orWhereHas('anggotas', function ($query) use ($nikKeyword) {
                $query->where('nik', 'LIKE', '%' . $nikKeyword . '%');
            });
        }
    
        // Get the results
        $pinjamans = $query->get();
    
        return view('pinjaman.index', compact('pinjamans'));
    }

    public function tambah()
    {
        $anggotas = DB::table('anggotas')->get();
        $pengaturans = DB::table('pengaturans')->get()->take(1)->first();
        return view('pinjaman.tambah', ['anggotas' => $anggotas], ['pengaturans' => $pengaturans]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggotas,id',
            'tgl_pinjaman' => 'required|date',
            'besar_pinjaman' => 'required|numeric',
            'keterangan' => 'required'
        ]);

        $user = Auth::user();

        $cek_jasa = DB::table('pengaturans')->first();
        $besar_pinjaman = $request->besar_pinjaman;
        $bagi_hasil = $cek_jasa->jasa_pinjaman / 100;
        $waktu = $request->jangka_waktu;

        $pokok = $besar_pinjaman / $waktu;
        $hasil_bagi = $bagi_hasil * $besar_pinjaman;
        $bayar_perbulan = $pokok + ($hasil_bagi/$waktu);
        $total = $bayar_perbulan * $waktu;

        $pinjamans = Pinjaman::create([
            'id_anggota' => $request->id_anggota,
            'tgl_pinjaman' => $request->tgl_pinjaman,
            'besar_pinjaman' => $besar_pinjaman,
            'bagi_hasil' => $cek_jasa->jasa_pinjaman,
            'jangka_waktu' => $request->jangka_waktu,
            'bayar_pokok' => $pokok,
            'hasil_bagi' => $hasil_bagi,
            'bayar_perbulan' => $bayar_perbulan,
            'total' => $total,
            'keterangan' => $request->keterangan,
            'user_id' => $user->id,
        ]);

        for ($bulan = 1; $bulan <= $waktu; $bulan++) {
            $date = Carbon::now('Asia/Jakarta');
            $date->modify('+' . $bulan . ' month');
            BayarPinjaman::create([
                'id_pinjaman' => $pinjamans->id,
                'jatuh_tempo' => $date->format('Y-m-d'),
                'tanggal_bayar' => null,
                'nominal' => $bayar_perbulan,
                'denda' => null,
                'status' => null,
            ]);
        }

        return redirect('/pinjaman');
    }

    public function edit(Pinjaman $pinjamans, $id)
    {
        $anggotas = Anggota::all();
        $pengaturans = Pengaturan::get()->take(1)->first();
        $pinjamans = Pinjaman::with(['anggotas'])->find($id);
        
        return view('pinjaman.edit',  compact('anggotas', 'pengaturans', 'pinjamans'));
    }

    public function update(Request $request, Pinjaman $pinjamans, $id)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggotas,id',
            'tgl_pinjaman' => 'required|date',
            'keterangan' => 'required'
        ]);

        // $pinjamans = Pinjaman::find($id);
        // $pinjamans->update($request->all());

        Pinjaman::where('id', $id)->update([
            'id_anggota' => $request->id_anggota,
            'tgl_pinjaman' => $request->tgl_pinjaman,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/pinjaman');
    }

    public function hapus($id)
    {
        $pinjamans = Pinjaman::findOrFail($id);
        $pinjamans->forceDelete();
        return redirect('/pinjaman');
    }

    public function cetak($id)
    {
        $pinjamans = Pinjaman::with(['anggotas'])->find($id);
        return view('pinjaman.cetak', compact('pinjamans'));
    }
    
    public function cetak_pdf(Request $request){

        $pinjamans = Pinjaman::with(['anggotas'])->find($request->id);
        $anggotas  = Anggota::find($request->id);

        $pdf = PDF::loadView('pinjaman.cetak_pdf', compact('pinjamans', 'anggotas'))->setPaper('a4', 'landscape');

        return $pdf->stream('cetak_pinjaman.pdf');
    }

}
