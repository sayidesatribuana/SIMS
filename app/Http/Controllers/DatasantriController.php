<?php

namespace App\Http\Controllers;

use App\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatasantriController extends Controller
{
    public function datasantri(Request $request)
	{
		$datasantri = $request->datasantri; 
		$santri = Santri::where('id', $datasantri)->get();
		$prestasi = DB::table('prestasi')->where('santri_id', $datasantri)->get();
        $pelanggaran = DB::table('pelanggaran')->where('santri_id', $datasantri)->get();
		$perizinan = DB::table('perizinan')->where('santri_id', $datasantri)->get();
		$jumlahprestasi = DB::table('prestasi')->where('santri_id', $datasantri)->count();
        $jumlahpelanggaran = DB::table('pelanggaran')->where('santri_id', $datasantri)->count();
        $jumlahperizinan = DB::table('perizinan')->where('santri_id', $datasantri)->count();
		return view('datasantri', compact('santri', 'prestasi', 'pelanggaran', 'perizinan', 'jumlahprestasi', 'jumlahpelanggaran', 'jumlahperizinan'));
	}
}
