<?php

namespace App\Exports;

use App\Models\Anggota;
use App\Models\Pinjaman;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PinjamanExport implements FromView, WithHeadings, ShouldAutoSize
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function view(): View
    {
        $query = Pinjaman::query();
        $query->whereBetween('tgl_pinjaman', [$this->start_date, $this->end_date]);
        // Get the filtered results
        $pinjamans = $query->get();
        $totalPinjaman = $pinjamans->sum('besar_pinjaman');

        return view('laporan.export-pinjaman', compact('pinjamans', 'totalPinjaman'));
    }

    public function headings(): array
    {
        return [
            'No', 'Tanggal Pinjaman', 'Nama Anggota', 'Bagi Hasil', 'Jangka Waktu', 'Keterangan', 'Jumlah'
        ];
    }
}
