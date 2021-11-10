<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Santri;
use App\Kelas;
use App\Prestasi;
use File;
use PDF;
use App\Exports\PrestasiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PrestasiController extends Controller
{
    public function index() {
        $now = Carbon::now();

        // mengambil data dari table tahun ajaran dan table prestasi
        $santri = Santri::all()->sortBy('nomorinduk');
        $kelas = Kelas::all()->sortBy('kelas');
        $prestasi = Prestasi::all()->sortByDesc('tanggalprestasi');
        
    	// mengirim data prestasi ke view monitoring.prestasi
        return view('prestasi.index', compact('santri', 'prestasi', 'kelas'));
    }

    public function storeprestasi(Request $request) {
        // pesan error validasi data
        $messages = [
            'required' => '*Harus diisi!',
            'numeric' => '*Harus diisi dengan angka!',
            'alpha' => '*Harus diisi dengan huruf!',
            'digits' => '*Melebihi batas maksimal :digits digit!',
            'file' => '*Data harus berupa file gambar!',
            'image' => '*Data harus berupa file gambar!',
            'mimes' => '*Data harus berupa file gambar!',
            'max' => '*Data tidak boleh lebih dari 2MB!'
        ];

        // validasi data yang diisikan ke dalam form
        $this->validate($request, [
			'pilihsantri' => 'required',
            'kelas' => 'required',
            'tanggalprestasi' => 'required',
            'namaprestasi' => 'required',
            'jenisprestasi' => 'required',
            'buktiprestasi' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048', // file gambar
		], $messages);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('buktiprestasi');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload, $nama_file);

        // insert data ke table prestasi
        DB::table('prestasi')->insert([
            'santri_id' => $request->pilihsantri,
            'kelas' => $request->kelas,
            'tanggalprestasi' => $request->tanggalprestasi,
            'namaprestasi' => $request->namaprestasi,
            'jenisprestasi' => $request->jenisprestasi,
            'buktiprestasi' => $nama_file,
        ]);
        
        // alihkan halaman ke halaman prestasi
        return redirect('/prestasi')->with('sukses', 'Data berhasil ditambah!');
    }

    public function editprestasi($id) {
	    // mengambil data prestasi berdasarkan id yang dipilih
        $prestasi = Prestasi::where('id',$id)->get();
    
	    // passing data prestasi yang didapat ke view editprestasi.blade.php
	    return view('prestasi.editprestasi',['prestasi' => $prestasi]);
    }

    public function updateprestasi(Request $request) {
        // update data prestasi
        Prestasi::where('id',$request->id)->update([
            'tanggalprestasi' => $request->tanggalprestasi,
            'namaprestasi' => $request->namaprestasi,
            'jenisprestasi' => $request->jenisprestasi,
            'buktiprestasi' => $request->buktiprestasi
        ]);
    
        // alihkan halaman ke halaman prestasi
        return redirect('/prestasi')->with('sukses', 'Data berhasil diedit!');
    }

    public function hapusprestasi($id) {
        // hapus file
	    $gambar = Prestasi::where('id',$id)->first();
	    File::delete('data_file/'.$gambar->buktiprestasi);

        // menghapus data prestasi berdasarkan id yang dipilih
        Prestasi::where('id',$id)->delete();
                
        // alihkan halaman ke halaman prestasi
        return redirect('/prestasi')->with('sukses', 'Data berhasil dihapus!');
    }

    public function buktiprestasi($id) {
        $prestasi = DB::table('prestasi')->where('id',$id)->get();
        return view('prestasi.buktiprestasi',['prestasi' => $prestasi]);
    }

    public function exportprestasi_excel()
	{
		return Excel::download(new PrestasiExport, 'Prestasi.xlsx');
    }
    
    public function cetakprestasi_pdf() {
        $now = Carbon::now();
        $prestasi = \App\Prestasi::all();
        $jumlahprestasi = \App\Prestasi::all()->count();
    
	    // passing data santri yang didapat ke view editsantri.blade.php
	    return view('export.prestasipdf', compact('now', 'prestasi', 'jumlahprestasi'));
    }
}
