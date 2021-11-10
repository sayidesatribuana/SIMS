<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Santri;
use App\Kelas;
use App\Perizinan;
use PDF;
use App\Exports\PerizinanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PerizinanController extends Controller
{
    public function index() {
        // mengambil data dari table perizinan
        $santri = Santri::all()->sortBy('nomorinduk');
        $kelas = Kelas::all()->sortBy('kelas');
        $perizinan = Perizinan::all()->sortByDesc('tanggalperizinan');

    	// mengirim data perizinan ke view monitoring.perizinan
        return view('perizinan.index', compact('santri', 'kelas' ,'perizinan'));
    }

    public function storeperizinan(Request $request) {
        // pesan error validasi data
        $messages = [
            'required' => '*Harus diisi!',
            'unique' => '*Data sudah ada!',
            'numeric' => '*Harus diisi dengan angka!',
            'digits' => '*Melebihi batas maksimal :digits digit!',
        ];
        
        // validasi data yang diisikan ke dalam form
        $this->validate($request,[
            'pilihsantri' => 'required',
            'kelas' => 'required',
            'tanggalperizinan' => 'required',
            'tanggalkembali' => 'required',
            'perihalperizinan' => 'required',
            'keterangankembali' => 'required',
        ], $messages);

        // insert data ke table perizinan
        DB::table('perizinan')->insert([
            'santri_id' => $request->pilihsantri,
            'kelas' => $request->kelas,
            'tanggalperizinan' => $request->tanggalperizinan,
            'tanggalkembali' => $request->tanggalkembali,
            'perihalperizinan' => $request->perihalperizinan,
            'keterangankembali' => $request->keterangankembali
        ]);
        
        // alihkan halaman ke halaman perizinan
        return redirect('/perizinan')->with('sukses', 'Data berhasil ditambah!');
    }

    public function editperizinan($id) {
	    // mengambil data perizinan berdasarkan id yang dipilih
        $perizinan = Perizinan::where('id',$id)->get();

	    // passing data perizinan yang didapat ke view editperizinan.blade.php
	    return view('perizinan.editperizinan', compact('perizinan'));
    }

    public function updateperizinan(Request $request) {
        // update data perizinan
        Perizinan::where('id', $request->id)->update([
            'tanggalperizinan' => $request->tanggalperizinan,
            'tanggalkembali' => $request->tanggalkembali,
            'perihalperizinan' => $request->perihalperizinan,
            'keterangankembali' => $request->keterangankembali
        ]);
    
        // alihkan halaman ke halaman perizinan
        return redirect('/perizinan')->with('sukses', 'Data berhasil diedit!');
    }

    public function hapusperizinan($id) {
        // menghapus data perizinan berdasarkan id yang dipilih
        DB::table('perizinan')->where('id',$id)->delete();
                
        // alihkan halaman ke halaman perizinan
        return redirect('/perizinan')->with('sukses', 'Data berhasil dihapus!');
    }

    public function buktiperizinan($id) {
        $perizinan = DB::table('perizinan')->where('id', $id)->get();
        return view('perizinan.buktiperizinan', ['perizinan'=>$perizinan]);
    }

    public function exportperizinan_excel()
	{
		return Excel::download(new PerizinanExport, 'Perizinan.xlsx');
    }
    
    public function cetakperizinan_pdf() {
        $now = Carbon::now();
        $perizinan = \App\Perizinan::all();
        $jumlahperizinan = \App\Perizinan::all()->count();
    
	    // passing data santri yang didapat ke view editsantri.blade.php
	    return view('export.perizinanpdf', compact('now', 'perizinan', 'jumlahperizinan'));
    }
}
