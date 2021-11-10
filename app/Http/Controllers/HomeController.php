<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Santri;

class HomeController extends Controller
{
    public function index() {
        // mengambil data dari table perizinan
        $santri = Santri::all()->sortBy('nomorinduk');

    	// mengirim data perizinan ke view monitoring.perizinan
        return view('home', compact('santri'));
    }
}
