<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index() {
        // mengambil data dari table users
        $users = User::all()->sortBy('name');
 
    	// mengirim data users ke view users.index
        return view('users.index', compact("users"));
    }

    public function storeuser(Request $request) {
        // pesan error validasi data
        $messages = [
            'required' => '*Harus diisi!',
            'unique' => '*Data sudah ada!',
        ];
        
        // validasi data yang diisikan ke dalam form
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required',
        ], $messages);

        // insert data ke table users
        DB::table('users')->insert([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request['password']),
            'role' => $request->role
        ]);
        
        // alihkan halaman ke halaman users
        return redirect('/users')->with('sukses', 'Data berhasil ditambah!');
    }
    
    public function edituser($username) {
	    // mengambil data users berdasarkan username yang dipilih
        $users = DB::table('users')->where('username', $username)->get();
    
	    // passing data santri yang didapat ke view editsantri.blade.php
	    return view('users.edituser', compact('users'));
    }

    public function updateuser(Request $request) {
	// update data users
        DB::table('users')->where('username',$request->username)->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request['password']),
            'role' => $request->role
        ]);

	// alihkan halaman ke halaman users
	    return redirect('/users')->with('sukses', 'Data berhasil diedit!');
    }

    public function hapususer($username) {
        // menghapus data users berdasarkan username yang dipilih
        DB::table('users')->where('username',$username)->delete();
            
        // alihkan halaman ke halaman santri
        return redirect('/users')->with('sukses', 'Data berhasil dihapus!');
    }

    public function detailuser($username) {
        $users = DB::table('users')->where('username', $username)->get();
        return view('users.detailuser', ['users'=>$users]);
    }
}
