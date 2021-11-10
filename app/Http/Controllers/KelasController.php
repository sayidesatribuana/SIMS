<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kelas;

class KelasController extends Controller
{
    public function index() {
        // mengambil data dari table tahunajaran dan table kelas
        $tahunajaran = Tahunajaran::all();
        $kelas = Kelas::all();
 
    	// mengirim data users ke view ekstradata.index
        return view('ekstradata.index', compact('tahunajaran', 'kelas'));
    }

    public function storekelas(Request $request) {
        // insert data ke table kelas
        \App\Kelas::create($request->all());
        
        // alihkan halaman ke halaman kelas
        return redirect('/kelas')->with('sukses', 'Data berhasil ditambah!');
    }

    public function hapuskelas($id) {
        // menghapus data kelas berdasarkan id yang dipilih
        DB::table('kelas')->where('id',$id)->delete();
                
        // alihkan halaman ke halaman kelas
        return redirect('/kelas')->with('sukses', 'Data berhasil dihapus!');
    }
}
