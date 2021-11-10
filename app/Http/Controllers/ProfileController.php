<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        // mengirim data users ke view users.index
        return view('profile.index');
    }

    public function gantipassword(Request $request) {
        $messages = [
            'required' => '*Harus diisi!',
        ];

        $request->validate([
            'passwordlama' => ['required', new MatchOldPassword],
            'passwordbaru' => 'required',
            'konfirmasipassword' => ['same:passwordbaru'],
        ], $messages);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request['passwordbaru'])]);

        return redirect('/profile')->with('sukses', 'Password berhasil diganti!');
    }
}
