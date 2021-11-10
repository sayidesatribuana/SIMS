<?php

namespace App\Exports;

use App\Perizinan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PerizinanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Perizinan::all();
    }

    public function map($perizinan): array
    {
        return [
            $perizinan->nomorinduk,
            $perizinan->tanggalperizinan,
            $perizinan->perihalperizinan,
            $perizinan->keterangankembali
        ];
    }

    public function headings(): array
    {
        return [
            'Nomor Induk',
            'Tanggal Perizinan',
            'Perihal Perizinan',
            'Keterangan Kembali'
        ];
    }
}
