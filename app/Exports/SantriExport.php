<?php

namespace App\Exports;

use App\Santri;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SantriExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Santri::all();
    }

    public function map($santri): array
    {
        return [
            $santri->nomorinduk,
            $santri->namasantri,
            $santri->jeniskelamin,
            $santri->tempatlahir,
            $santri->tanggallahir,
            $santri->alamat,
            $santri->nomorhp,
            $santri->kelas,
            $santri->tahunajaran
        ];
    }

    public function headings(): array
    {
        return [
            'Nomor Induk',
            'Nama Santri',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'Nomor Hp',
            'Kelas',
            'Tahun Ajaran'
        ];
    }
}
