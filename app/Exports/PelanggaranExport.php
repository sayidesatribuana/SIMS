<?php

namespace App\Exports;

use App\Pelanggaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PelanggaranExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pelanggaran::all();
    }

    public function map($pelanggaran): array
    {
        return [
            $pelanggaran->nomorinduk,
            $pelanggaran->tanggalpelanggaran,
            $pelanggaran->namapelanggaran,
            $pelanggaran->jenispelanggaran,
            $pelanggaran->sanksipelanggaran
        ];
    }

    public function headings(): array
    {
        return [
            'Nomor Induk',
            'Tanggal Pelanggaran',
            'Nama Pelanggaran',
            'Jenis Pelanggaran',
            'Sanksi Pelanggaran'
        ];
    }
}
