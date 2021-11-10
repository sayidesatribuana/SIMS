<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tahunajaran;
use App\Kelas;

class EkstradataController extends Controller
{
    public function index() {
        // mengambil data dari table tahunajaran dan table kelas
        $tahunajaran = Tahunajaran::all()->sortBy('tahunajaran');
        $kelas = Kelas::all()->sortBy('kelas');
 
    	// mengirim data users ke view ekstradata.index
        return view('ekstradata.index', compact('tahunajaran', 'kelas'));
    }

    public function storetahunajaran(Request $request) {
        // pesan error validasi data
        $messages = [
            'required' => '*Atribut harus diisi!',
            'max' => '*Atribut harus diisi maksimal 9 karakter!',
        ];

        // validasi data yang diisikan ke dalam form
        $this->validate($request,[
            'tahunajaran' => 'required|max:9',
        ], $messages);

        // insert data ke table tahunajaran
        \App\Tahunajaran::create($request->all());
        
        // alihkan halaman ke halaman tahunajaran
        return redirect('/ekstradata')->with('sukses', 'Data berhasil ditambah!');
    }

    public function storekelas(Request $request) {
        // pesan error validasi data
        $messages = [
            'required' => '*Atribut harus diisi!',
            'max' => '*Atribut harus diisi maksimal 5 karakter!',
        ];

        // validasi data yang diisikan ke dalam form
        $this->validate($request,[
            'kelas' => 'required|max:5',
        ], $messages);

        // insert data ke table kelas
        \App\Kelas::create($request->all());
        
        // alihkan halaman ke halaman kelas
        return redirect('/ekstradata')->with('sukses', 'Data berhasil ditambah!');
    }

    public function hapustahunajaran($id) {
        // menghapus data tahunajaran berdasarkan id yang dipilih
        DB::table('tahunajaran')->where('id',$id)->delete();
                
        // alihkan halaman ke halaman tahunajaran
        return redirect('/ekstradata')->with('sukses', 'Data berhasil dihapus!');
    }

    public function hapuskelas($id) {
        // menghapus data kelas berdasarkan id yang dipilih
        DB::table('kelas')->where('id',$id)->delete();
                
        // alihkan halaman ke halaman kelas
        return redirect('/kelas')->with('sukses', 'Data berhasil dihapus!');
    }
}
