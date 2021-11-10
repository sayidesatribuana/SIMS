<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Santri;
use App\Kelas;
use App\Pelanggaran;
use File;
use PDF;
use App\Exports\PelanggaranExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PelanggaranController extends Controller
{
    public function index() {
        $now = Carbon::now();

        // mengambil data dari table pelanggaran
        $santri = Santri::all()->sortBy('nomorinduk');
        $kelas = Kelas::all()->sortBy('kelas');
        $pelanggaran = Pelanggaran::all()->sortByDesc('tanggalpelanggaran');
 
    	// mengirim data pelanggaran ke view monitoring.pelanggaran
        return view('pelanggaran.index', compact('santri', 'kelas', 'pelanggaran'));
    }

    public function storepelanggaran(Request $request) {
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
            'tanggalpelanggaran' => 'required',
            'namapelanggaran' => 'required',
            'jenispelanggaran' => 'required',
            'sanksipelanggaran' => 'required',
            'buktipelanggaran' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048', // file gambar
		], $messages);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('buktipelanggaran');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file2';
		$file->move($tujuan_upload, $nama_file);

        // insert data ke table Pelanggaran
        DB::table('pelanggaran')->insert([
            'santri_id' => $request->pilihsantri,
            'kelas' => $request->kelas,
            'tanggalpelanggaran' => $request->tanggalpelanggaran,
            'namapelanggaran' => $request->namapelanggaran,
            'jenispelanggaran' => $request->jenispelanggaran,
            'sanksipelanggaran' => $request->sanksipelanggaran,
            'buktipelanggaran' => $nama_file,
        ]);
        
        // alihkan halaman ke halaman pelanggaran
        return redirect('/pelanggaran')->with('sukses', 'Data berhasil ditambah!');
    }

    public function editpelanggaran($id) {
	    // mengambil data pelanggaran berdasarkan id yang dipilih
        $pelanggaran = Pelanggaran::where('id',$id)->get();
    
	    // passing data pelanggaran yang didapat ke view editpelanggaran.blade.php
	    return view('pelanggaran.editpelanggaran',['pelanggaran' => $pelanggaran]);
    }

    public function updatepelanggaran(Request $request) {
        // update data pelanggaran
        Pelanggaran::where('id',$request->id)->update([
            'tanggalpelanggaran' => $request->tanggalpelanggaran,
            'namapelanggaran' => $request->namapelanggaran,
            'jenispelanggaran' => $request->jenispelanggaran,
            'sanksipelanggaran' => $request->sanksipelanggaran,
            'buktipelanggaran' => $request->buktipelanggaran
        ]);
    
        // alihkan halaman ke halaman pelanggaran
        return redirect('/pelanggaran')->with('sukses', 'Data berhasil diedit!');
    }

    public function hapuspelanggaran($id) {
        // hapus file
	    $gambar = Pelanggaran::where('id',$id)->first();
	    File::delete('data_file2/'.$gambar->buktipelanggaran);

        // menghapus data pelanggaran berdasarkan id yang dipilih
        Pelanggaran::where('id',$id)->delete();
                
        // alihkan halaman ke halaman pelanggaran
        return redirect('/pelanggaran')->with('sukses', 'Data berhasil dihapus!');
    }

    public function buktipelanggaran($id) {
        $pelanggaran = DB::table('pelanggaran')->where('id', $id)->get();
        return view('pelanggaran.buktipelanggaran', ['pelanggaran'=>$pelanggaran]);
    }

    public function exportpelanggaran_excel()
	{
		return Excel::download(new PelanggaranExport, 'Pelanggaran.xlsx');
    }
    
    public function cetakpelanggaran_pdf() {
        $now = Carbon::now();
        $pelanggaran = \App\Pelanggaran::all();
        $jumlahpelanggaran = \App\Pelanggaran::all()->count();
    
	    // passing data santri yang didapat ke view editsantri.blade.php
	    return view('export.pelanggaranpdf', compact('now', 'pelanggaran', 'jumlahpelanggaran'));
    }
}
