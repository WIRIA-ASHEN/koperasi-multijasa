<?php

namespace App\Exports;

use App\Models\Anggota;
use App\Models\Pinjaman;
use Illuminate\View\View;
use App\Models\BayarPinjaman;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BayarPinjamanExport implements FromView, WithHeadings, ShouldAutoSize
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
            $query = BayarPinjaman::query();
            $query->whereBetween('tanggal_bayar', [$this->start_date, $this->end_date]);
            // Get the filtered results
            $bayar_pinjaman = $query->get();
            $totalAngsuran = $bayar_pinjaman->sum('nominal');
    
            
            return view('laporan.export-angsuran', compact('bayar_pinjaman', 'totalAngsuran'));
        }
    

    public function headings(): array
    {
        return [
            'No', 'Nama Anggota', 'Tanggal Jatuh Tempo', 'Tanggal Bayar', 'Nominal', 'Denda', 'Status'
        ];
    }
}
