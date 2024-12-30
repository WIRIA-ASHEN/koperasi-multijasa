<?php

namespace App\Exports;

use App\Models\Anggota;
use App\Models\Simpanan;
use App\Models\JenisSimpanan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;

class SimpananExport implements FromView, WithHeadings, ShouldAutoSize
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
        $query = Simpanan::query();
        $query->whereBetween('tgl_simpanan', [$this->start_date, $this->end_date]);
        // Get the filtered results
        $simpanans = $query->get();

        // Recalculate the totalSimpanan for the filtered data
        $totalSimpanan = $simpanans->sum('besar_simpanan');

        return view('laporan.export-simpanan', compact('simpanans', 'totalSimpanan'));
    }

    public function headings(): array
    {
        return [
            'No',
            'ID Anggota',
            'Nama',
            'NIK',
            'Jenis Simpanan',
            'Tanggal Simpanan',
            'Besar Simpanan',
        ];
    }
}