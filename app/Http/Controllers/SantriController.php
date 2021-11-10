<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Santri;
use App\Tahunajaran;
use App\Kelas;
use PDF;
use App\Imports\SantriImport;
use App\Exports\SantriExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;

class SantriController extends Controller
{
    public function index() {
        // mengambil data dari table santri
        $santri = Santri::all()->sortBy('kelas');
        $tahunajaran = Tahunajaran::all()->sortByDesc('tahunajaran');
        $kelas = Kelas::all()->sortBy('kelas');

    	// mengirim data santri ke view santri.index
        return view('santri.index', compact('santri', 'tahunajaran', 'kelas'));
    }

    public function storesantri(Request $request) {
        $now = Carbon::now();
        // pesan error validasi data
        $messages = [
            'required' => '*Harus diisi!',
            'unique' => '*Data sudah ada!',
            'numeric' => '*Harus diisi dengan angka!',
            'digits' => '*Melebihi batas maksimal :digits digit!',
        ];
        
        // validasi data yang diisikan ke dalam form
        $this->validate($request,[
            'nomorinduk' => 'required|digits:4|numeric|unique:santri',
            'namasantri' => 'required',
            'jeniskelamin' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'alamat' => 'required',
            'nomorhp' => 'required|digits:12|numeric',
            'kelas' => 'required',
            'tahunajaran' => 'required',
        ], $messages);
        
        // insert data ke table santri
        DB::table('santri')->insert([
            'nomorinduk' => $request->nomorinduk,
            'namasantri' => $request->namasantri,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'alamat' => $request->alamat,
            'nomorhp' => $request->nomorhp,
            'kelas' => $request->kelas,
            'tahunajaran' => $request->tahunajaran,
            'created_at' => $now
        ]);
        
        // alihkan halaman ke halaman santri
        return redirect('/santri')->with('sukses', 'Data berhasil ditambah!');
    }

    public function editsantri($id) {
	    // mengambil data santri berdasarkan nomorinduk yang dipilih
        $santri = DB::table('santri')->where('id',$id)->get();
        $tahunajaran = Tahunajaran::all()->sortByDesc('tahunajaran');
        $kelas = Kelas::all()->sortBy('kelas');
    
	    // passing data santri yang didapat ke view editsantri.blade.php
	    return view('santri.editsantri', compact('santri', 'tahunajaran', 'kelas'));
    }

    public function updatesantri(Request $request) {
	// update data santri
        $santri = Santri::where('id', $request->id)->update([
            'nomorinduk' => $request->nomorinduk,
            'namasantri' => $request->namasantri,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'alamat' => $request->alamat,
            'nomorhp' => $request->nomorhp,
            'kelas' => $request->kelas,
            'tahunajaran' => $request->tahunajaran
        ]);

	// alihkan halaman ke halaman santri
	    return redirect('/santri')->with('sukses', 'Data berhasil diedit!');
    }

    public function hapussantri($id) {
	// menghapus data santri berdasarkan nomorinduk yang dipilih
    DB::table('santri')->where('id',$id)->delete();
		
	// alihkan halaman ke halaman santri
	return redirect('/santri')->with('sukses', 'Data berhasil dihapus!');
    }

    public function detailsantri($santri_id) {
        $santri = DB::table('santri')->where('id', $santri_id)->get();
        $prestasi = DB::table('prestasi')->where('santri_id', $santri_id)->get();
        $pelanggaran = DB::table('pelanggaran')->where('santri_id', $santri_id)->get();
        $perizinan = DB::table('perizinan')->where('santri_id', $santri_id)->get();
        $jumlahprestasi = DB::table('prestasi')->where('santri_id', $santri_id)->count();
        $jumlahpelanggaran = DB::table('pelanggaran')->where('santri_id', $santri_id)->count();
        $jumlahperizinan = DB::table('perizinan')->where('santri_id', $santri_id)->count();
        return view('santri.detailsantri', compact('santri', 'prestasi', 'pelanggaran', 'perizinan', 'jumlahprestasi', 'jumlahpelanggaran', 'jumlahperizinan'));
    }

    public function kenaikankelas(Request $request) {
        // update data santri
            DB::table('santri')->where('kelas',$request->kelassaatini)->update([
                'kelas' => $request->kenaikankelas,
            ]);
    
        // alihkan halaman ke halaman santri
            return redirect('/santri')->with('sukses', 'Data berhasil diedit!');
    }

    public function kelulusan(Request $request) {
        // update data santri
            DB::table('santri')->where('kelas',$request->kelassaatini)->update([
                'kelas' => $request->kelulusan,
            ]);
    
        // alihkan halaman ke halaman santri
            return redirect('/santri')->with('sukses', 'Data berhasil diedit!');
    }

    public function import_excel(Request $request) {
        // validasi data yang diisikan ke dalam form
	    $this->validate($request, [
		    'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_santri di dalam folder public
		$file->move('file_santri',$nama_file);
 
		// import data
		Excel::import(new SantriImport, public_path('/file_santri/'.$nama_file));
 
		// alihkan halaman kembali
		return redirect('/santri')->with('sukses', 'Data berhasil diimport!');
	}

    public function export_excel() {
		return Excel::download(new SantriExport, 'Santri.xlsx');
    }
    
    public function cetak_pdf() {
        // format waktu now
        $now = Carbon::now();
        $year = Carbon::now()->format('Y');

        // ngambil data masuk 1 tahun atau 2 tahun sebelum now
        $second = DB::table('santri')->whereYear('created_at', $year-2);
        $first = DB::table('santri')->whereYear('created_at', $year-1);
        $santrii = $second->union($first);

        // perhitungan total pada tahun $now (kecuali jumlah santri)
        $totalsantri = DB::table('santri')->whereYear('created_at', $year)->union($santrii)->count();
        $totalusers = DB::table('users')->count();

        $now = Carbon::now();
        $santri = Santri::all()->sortBy('kelas');

        return view('export.santripdf', compact('now', 'santri', 'totalsantri'));
    }

    public function cetakdetail_pdf($santri_id) {
        $now = Carbon::now();
    	$santri = \App\Santri::where('id', $santri_id)->get();
        $prestasi = \App\Prestasi::where('santri_id', $santri_id)->get();
        $pelanggaran = \App\Pelanggaran::where('santri_id', $santri_id)->get();
        $perizinan = \App\Perizinan::where('santri_id', $santri_id)->get();
        $jumlahprestasi = DB::table('prestasi')->where('santri_id', $santri_id)->count();
        $jumlahpelanggaran = DB::table('pelanggaran')->where('santri_id', $santri_id)->count();
        $jumlahperizinan = DB::table('perizinan')->where('santri_id', $santri_id)->count();
    
	    // passing data santri yang didapat ke view editsantri.blade.php
	    return view('export.detailsantripdf', compact('now', 'santri', 'prestasi', 'pelanggaran', 'perizinan', 'jumlahprestasi', 'jumlahpelanggaran', 'jumlahperizinan'));
    }
}
