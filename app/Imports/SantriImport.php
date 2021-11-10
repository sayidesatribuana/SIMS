<?php

namespace App\Imports;

use App\Santri;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SantriImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection) {
        foreach($collection as $key => $row) {
            if($key >= 1){
                $tanggallahir = ($row[5] - 25569) * 86400;
                Santri::create([
                    'nomorinduk' => $row[1],
                    'namasantri' => $row[2], 
                    'jeniskelamin' => $row[3],
                    'tempatlahir' => $row[4],
                    'tanggallahir' => gmdate('Y-m-d', $tanggallahir),
                    'alamat' => $row[6],
                    'nomorhp' => $row[7],
                    'kelas' => $row[8],
                    'tahunajaran' => $row[9],
                ]); 
            }
        }    
    }
}
