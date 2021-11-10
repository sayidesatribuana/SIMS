<?php

namespace App\Exports;

use App\Prestasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrestasiExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prestasi::all();
    }

    public function map($prestasi): array
    {
        return [
            $prestasi->nomorinduk,
            $prestasi->tanggalprestasi,
            $prestasi->namaprestasi,
            $prestasi->jenisprestasi
        ];
    }

    public function headings(): array
    {
        return [
            'Nomor Induk',
            'Tanggal Prestasi',
            'Nama Prestasi',
            'Jenis Prestasi'
        ];
    }
}
