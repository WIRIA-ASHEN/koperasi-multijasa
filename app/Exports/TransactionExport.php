<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Simpanan;
use App\Models\Pinjaman;
use App\Models\BayarPinjaman;
use Illuminate\Support\Collection;

class TransactionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $simpanans = Simpanan::all();
        

        return new Collection([
            'Simpanans' => $simpanans,
            
        ]);
        
    }
}

