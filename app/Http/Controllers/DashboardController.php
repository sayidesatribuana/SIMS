<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        // format waktu now
        $now = Carbon::now();
        $year = Carbon::now()->format('Y');

        // ngambil data masuk 1 tahun atau 2 tahun sebelum now
        $second = DB::table('santri')->whereYear('created_at', $year-2);
        $first = DB::table('santri')->whereYear('created_at', $year-1);
        $santri = $second->union($first);

        // perhitungan total pada tahun $now (kecuali jumlah santri)
        $totalsantri = DB::table('santri')->whereYear('created_at', $year)->union($santri)->count();
        $totalprestasi = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->count();
        $totalpelanggaran = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->count();
        $totalperizinan = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->count();
        $totalusers = DB::table('users')->count();

        // prestasi kelas 1-KMI tiap bulan
        $prestasi_januari_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 1)->count();
        $prestasi_februari_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 2)->count();
        $prestasi_maret_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 3)->count();
        $prestasi_april_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 4)->count();
        $prestasi_mei_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 5)->count();
        $prestasi_juni_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 6)->count();
        $prestasi_juli_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 7)->count();
        $prestasi_agustus_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 8)->count();
        $prestasi_september_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 9)->count();
        $prestasi_oktober_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 10)->count();
        $prestasi_november_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 11)->count();
        $prestasi_desember_a = DB::table('prestasi')->where('kelas', 'like', '1%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 12)->count();

        // prestasi kelas 2-KMI tiap bulan
        $prestasi_januari_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 1)->count();
        $prestasi_februari_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 2)->count();
        $prestasi_maret_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 3)->count();
        $prestasi_april_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 4)->count();
        $prestasi_mei_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 5)->count();
        $prestasi_juni_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 6)->count();
        $prestasi_juli_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 7)->count();
        $prestasi_agustus_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 8)->count();
        $prestasi_september_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 9)->count();
        $prestasi_oktober_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 10)->count();
        $prestasi_november_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 11)->count();
        $prestasi_desember_b = DB::table('prestasi')->where('kelas', 'like', '2%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 12)->count();

        // prestasi kelas 3-KMI tiap bulan
        $prestasi_januari_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 1)->count();
        $prestasi_februari_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 2)->count();
        $prestasi_maret_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 3)->count();
        $prestasi_april_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 4)->count();
        $prestasi_mei_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 5)->count();
        $prestasi_juni_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 6)->count();
        $prestasi_juli_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 7)->count();
        $prestasi_agustus_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 8)->count();
        $prestasi_september_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 9)->count();
        $prestasi_oktober_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 10)->count();
        $prestasi_november_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 11)->count();
        $prestasi_desember_c = DB::table('prestasi')->where('kelas', 'like', '3%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 12)->count();

        // prestasi kelas 4-KMI tiap bulan
        $prestasi_januari_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 1)->count();
        $prestasi_februari_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 2)->count();
        $prestasi_maret_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 3)->count();
        $prestasi_april_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 4)->count();
        $prestasi_mei_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 5)->count();
        $prestasi_juni_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 6)->count();
        $prestasi_juli_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 7)->count();
        $prestasi_agustus_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 8)->count();
        $prestasi_september_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 9)->count();
        $prestasi_oktober_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 10)->count();
        $prestasi_november_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 11)->count();
        $prestasi_desember_d = DB::table('prestasi')->where('kelas', 'like', '4%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 12)->count();

        // prestasi kelas 5-KMI tiap bulan
        $prestasi_januari_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 1)->count();
        $prestasi_februari_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 2)->count();
        $prestasi_maret_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 3)->count();
        $prestasi_april_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 4)->count();
        $prestasi_mei_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 5)->count();
        $prestasi_juni_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 6)->count();
        $prestasi_juli_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 7)->count();
        $prestasi_agustus_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 8)->count();
        $prestasi_september_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 9)->count();
        $prestasi_oktober_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 10)->count();
        $prestasi_november_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 11)->count();
        $prestasi_desember_e = DB::table('prestasi')->where('kelas', 'like', '5%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 12)->count();

        // prestasi kelas 6-KMI tiap bulan
        $prestasi_januari_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 1)->count();
        $prestasi_februari_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 2)->count();
        $prestasi_maret_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 3)->count();
        $prestasi_april_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 4)->count();
        $prestasi_mei_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 5)->count();
        $prestasi_juni_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 6)->count();
        $prestasi_juli_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 7)->count();
        $prestasi_agustus_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 8)->count();
        $prestasi_september_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 9)->count();
        $prestasi_oktober_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 10)->count();
        $prestasi_november_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 11)->count();
        $prestasi_desember_f = DB::table('prestasi')->where('kelas', 'like', '6%')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 12)->count();
        
        // total prestasi tiap bulan
        $totalprestasi_januari = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 1)->count();
        $totalprestasi_februari = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 2)->count();
        $totalprestasi_maret = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 3)->count();
        $totalprestasi_april = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 4)->count();
        $totalprestasi_mei = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 5)->count();
        $totalprestasi_juni = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 6)->count();
        $totalprestasi_juli = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 7)->count();
        $totalprestasi_agustus = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 8)->count();
        $totalprestasi_september = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 9)->count();
        $totalprestasi_oktober = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 10)->count();
        $totalprestasi_november = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 11)->count();
        $totalprestasi_desember = DB::table('prestasi')->whereYear('tanggalprestasi', $now)->whereMonth('tanggalprestasi', 12)->count();

        // pelanggaran kelas 1-KMI tiap bulan
        $pelanggaran_januari_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 1)->count();
        $pelanggaran_februari_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 2)->count();
        $pelanggaran_maret_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 3)->count();
        $pelanggaran_april_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 4)->count();
        $pelanggaran_mei_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 5)->count();
        $pelanggaran_juni_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 6)->count();
        $pelanggaran_juli_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 7)->count();
        $pelanggaran_agustus_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 8)->count();
        $pelanggaran_september_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 9)->count();
        $pelanggaran_oktober_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 10)->count();
        $pelanggaran_november_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 11)->count();
        $pelanggaran_desember_a = DB::table('pelanggaran')->where('kelas', 'like', '1%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 12)->count();

        // pelanggaran kelas 2-KMI tiap bulan
        $pelanggaran_januari_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 1)->count();
        $pelanggaran_februari_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 2)->count();
        $pelanggaran_maret_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 3)->count();
        $pelanggaran_april_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 4)->count();
        $pelanggaran_mei_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 5)->count();
        $pelanggaran_juni_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 6)->count();
        $pelanggaran_juli_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 7)->count();
        $pelanggaran_agustus_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 8)->count();
        $pelanggaran_september_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 9)->count();
        $pelanggaran_oktober_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 10)->count();
        $pelanggaran_november_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 11)->count();
        $pelanggaran_desember_b = DB::table('pelanggaran')->where('kelas', 'like', '2%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 12)->count();

        // pelanggaran kelas 3-KMI tiap bulan
        $pelanggaran_januari_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 1)->count();
        $pelanggaran_februari_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 2)->count();
        $pelanggaran_maret_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 3)->count();
        $pelanggaran_april_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 4)->count();
        $pelanggaran_mei_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 5)->count();
        $pelanggaran_juni_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 6)->count();
        $pelanggaran_juli_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 7)->count();
        $pelanggaran_agustus_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 8)->count();
        $pelanggaran_september_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 9)->count();
        $pelanggaran_oktober_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 10)->count();
        $pelanggaran_november_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 11)->count();
        $pelanggaran_desember_c = DB::table('pelanggaran')->where('kelas', 'like', '3%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 12)->count();

        // pelanggaran kelas 4-KMI tiap bulan
        $pelanggaran_januari_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 1)->count();
        $pelanggaran_februari_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 2)->count();
        $pelanggaran_maret_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 3)->count();
        $pelanggaran_april_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 4)->count();
        $pelanggaran_mei_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 5)->count();
        $pelanggaran_juni_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 6)->count();
        $pelanggaran_juli_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 7)->count();
        $pelanggaran_agustus_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 8)->count();
        $pelanggaran_september_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 9)->count();
        $pelanggaran_oktober_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 10)->count();
        $pelanggaran_november_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 11)->count();
        $pelanggaran_desember_d = DB::table('pelanggaran')->where('kelas', 'like', '4%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 12)->count();

        // pelanggaran kelas 5-KMI tiap bulan
        $pelanggaran_januari_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 1)->count();
        $pelanggaran_februari_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 2)->count();
        $pelanggaran_maret_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 3)->count();
        $pelanggaran_april_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 4)->count();
        $pelanggaran_mei_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 5)->count();
        $pelanggaran_juni_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 6)->count();
        $pelanggaran_juli_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 7)->count();
        $pelanggaran_agustus_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 8)->count();
        $pelanggaran_september_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 9)->count();
        $pelanggaran_oktober_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 10)->count();
        $pelanggaran_november_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 11)->count();
        $pelanggaran_desember_e = DB::table('pelanggaran')->where('kelas', 'like', '5%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 12)->count();

        // pelanggaran kelas 6-KMI tiap bulan
        $pelanggaran_januari_f = DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 1)->count();
        $pelanggaran_februari_f = DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 2)->count();
        $pelanggaran_maret_f = DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 3)->count();
        $pelanggaran_april_f = DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 4)->count();
        $pelanggaran_mei_f = DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 5)->count();
        $pelanggaran_juni_f = DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 6)->count();
        $pelanggaran_juli_f = DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 7)->count();
        $pelanggaran_agustus_f = DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 8)->count();
        $pelanggaran_september_f = DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 9)->count();
        $pelanggaran_oktober_f = DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 10)->count();
        $pelanggaran_november_f = DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 11)->count();
        $pelanggaran_desember_f= DB::table('pelanggaran')->where('kelas', 'like', '6%')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 12)->count();
        
        // total pelanggaran tiap bulan ----
        $totalpelanggaran_januari = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 1)->count();
        $totalpelanggaran_februari = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 2)->count();
        $totalpelanggaran_maret = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 3)->count();
        $totalpelanggaran_april = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 4)->count();
        $totalpelanggaran_mei = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 5)->count();
        $totalpelanggaran_juni = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 6)->count();
        $totalpelanggaran_juli = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 7)->count();
        $totalpelanggaran_agustus = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 8)->count();
        $totalpelanggaran_september = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 9)->count();
        $totalpelanggaran_oktober = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 10)->count();
        $totalpelanggaran_november = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 11)->count();
        $totalpelanggaran_desember = DB::table('pelanggaran')->whereYear('tanggalpelanggaran', $now)->whereMonth('tanggalpelanggaran', 12)->count();

        // perizinan kelas 1-KMI tiap bulan
        $perizinan_januari_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 1)->count();
        $perizinan_februari_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 2)->count();
        $perizinan_maret_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 3)->count();
        $perizinan_april_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 4)->count();
        $perizinan_mei_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 5)->count();
        $perizinan_juni_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 6)->count();
        $perizinan_juli_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 7)->count();
        $perizinan_agustus_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 8)->count();
        $perizinan_september_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 9)->count();
        $perizinan_oktober_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 10)->count();
        $perizinan_november_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 11)->count();
        $perizinan_desember_a = DB::table('perizinan')->where('kelas', 'like', '1%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 12)->count();

        // perizinan kelas 2-KMI tiap bulan
        $perizinan_januari_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 1)->count();
        $perizinan_februari_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 2)->count();
        $perizinan_maret_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 3)->count();
        $perizinan_april_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 4)->count();
        $perizinan_mei_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 5)->count();
        $perizinan_juni_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 6)->count();
        $perizinan_juli_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 7)->count();
        $perizinan_agustus_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 8)->count();
        $perizinan_september_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 9)->count();
        $perizinan_oktober_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 10)->count();
        $perizinan_november_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 11)->count();
        $perizinan_desember_b = DB::table('perizinan')->where('kelas', 'like', '2%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 12)->count();

        // perizinan kelas 3-KMI tiap bulan
        $perizinan_januari_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 1)->count();
        $perizinan_februari_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 2)->count();
        $perizinan_maret_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 3)->count();
        $perizinan_april_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 4)->count();
        $perizinan_mei_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 5)->count();
        $perizinan_juni_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 6)->count();
        $perizinan_juli_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 7)->count();
        $perizinan_agustus_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 8)->count();
        $perizinan_september_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 9)->count();
        $perizinan_oktober_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 10)->count();
        $perizinan_november_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 11)->count();
        $perizinan_desember_c = DB::table('perizinan')->where('kelas', 'like', '3%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 12)->count();

        // perizinan kelas 4-KMI tiap bulan
        $perizinan_januari_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 1)->count();
        $perizinan_februari_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 2)->count();
        $perizinan_maret_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 3)->count();
        $perizinan_april_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 4)->count();
        $perizinan_mei_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 5)->count();
        $perizinan_juni_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 6)->count();
        $perizinan_juli_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 7)->count();
        $perizinan_agustus_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 8)->count();
        $perizinan_september_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 9)->count();
        $perizinan_oktober_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 10)->count();
        $perizinan_november_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 11)->count();
        $perizinan_desember_d = DB::table('perizinan')->where('kelas', 'like', '4%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 12)->count();

        // perizinan kelas 5-KMI tiap bulan
        $perizinan_januari_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 1)->count();
        $perizinan_februari_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 2)->count();
        $perizinan_maret_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 3)->count();
        $perizinan_april_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 4)->count();
        $perizinan_mei_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 5)->count();
        $perizinan_juni_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 6)->count();
        $perizinan_juli_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 7)->count();
        $perizinan_agustus_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 8)->count();
        $perizinan_september_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 9)->count();
        $perizinan_oktober_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 10)->count();
        $perizinan_november_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 11)->count();
        $perizinan_desember_e = DB::table('perizinan')->where('kelas', 'like', '5%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 12)->count();

        // perizinan kelas 6-KMI tiap bulan
        $perizinan_januari_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 1)->count();
        $perizinan_februari_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 2)->count();
        $perizinan_maret_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 3)->count();
        $perizinan_april_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 4)->count();
        $perizinan_mei_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 5)->count();
        $perizinan_juni_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 6)->count();
        $perizinan_juli_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 7)->count();
        $perizinan_agustus_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 8)->count();
        $perizinan_september_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 9)->count();
        $perizinan_oktober_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 10)->count();
        $perizinan_november_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 11)->count();
        $perizinan_desember_f = DB::table('perizinan')->where('kelas', 'like', '6%')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 12)->count();
        
        // total perizinan tiap bulan
        $totalperizinan_januari = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 1)->count();
        $totalperizinan_februari = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 2)->count();
        $totalperizinan_maret = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 3)->count();
        $totalperizinan_april = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 4)->count();
        $totalperizinan_mei = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 5)->count();
        $totalperizinan_juni = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 6)->count();
        $totalperizinan_juli = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 7)->count();
        $totalperizinan_agustus = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 8)->count();
        $totalperizinan_september = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 9)->count();
        $totalperizinan_oktober = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 10)->count();
        $totalperizinan_november = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 11)->count();
        $totalperizinan_desember = DB::table('perizinan')->whereYear('tanggalperizinan', $now)->whereMonth('tanggalperizinan', 12)->count();

        return view('dashboards.index', compact('year', 'totalsantri', 'totalprestasi', 'totalpelanggaran', 'totalperizinan', 'totalusers',
        'prestasi_januari_a', 'prestasi_februari_a', 'prestasi_maret_a', 'prestasi_april_a', 'prestasi_mei_a', 'prestasi_juni_a', 'prestasi_juli_a', 'prestasi_agustus_a', 'prestasi_september_a', 'prestasi_oktober_a', 'prestasi_november_a', 'prestasi_desember_a',
        'prestasi_januari_b', 'prestasi_februari_b', 'prestasi_maret_b', 'prestasi_april_b', 'prestasi_mei_b', 'prestasi_juni_b', 'prestasi_juli_b', 'prestasi_agustus_b', 'prestasi_september_b', 'prestasi_oktober_b', 'prestasi_november_b', 'prestasi_desember_b',
        'prestasi_januari_c', 'prestasi_februari_c', 'prestasi_maret_c', 'prestasi_april_c', 'prestasi_mei_c', 'prestasi_juni_c', 'prestasi_juli_c', 'prestasi_agustus_c', 'prestasi_september_c', 'prestasi_oktober_c', 'prestasi_november_c', 'prestasi_desember_c',
        'prestasi_januari_d', 'prestasi_februari_d', 'prestasi_maret_d', 'prestasi_april_d', 'prestasi_mei_d', 'prestasi_juni_d', 'prestasi_juli_d', 'prestasi_agustus_d', 'prestasi_september_d', 'prestasi_oktober_d', 'prestasi_november_d', 'prestasi_desember_d',
        'prestasi_januari_e', 'prestasi_februari_e', 'prestasi_maret_e', 'prestasi_april_e', 'prestasi_mei_e', 'prestasi_juni_e', 'prestasi_juli_e', 'prestasi_agustus_e', 'prestasi_september_e', 'prestasi_oktober_e', 'prestasi_november_e', 'prestasi_desember_e',
        'prestasi_januari_f', 'prestasi_februari_f', 'prestasi_maret_f', 'prestasi_april_f', 'prestasi_mei_f', 'prestasi_juni_f', 'prestasi_juli_f', 'prestasi_agustus_f', 'prestasi_september_f', 'prestasi_oktober_f', 'prestasi_november_f', 'prestasi_desember_f',
        'totalprestasi_januari', 'totalprestasi_februari', 'totalprestasi_maret', 'totalprestasi_april', 'totalprestasi_mei', 'totalprestasi_juni', 'totalprestasi_juli', 'totalprestasi_agustus', 'totalprestasi_september', 'totalprestasi_oktober', 'totalprestasi_november', 'totalprestasi_desember',
        'pelanggaran_januari_a', 'pelanggaran_februari_a', 'pelanggaran_maret_a', 'pelanggaran_april_a', 'pelanggaran_mei_a', 'pelanggaran_juni_a', 'pelanggaran_juli_a', 'pelanggaran_agustus_a', 'pelanggaran_september_a', 'pelanggaran_oktober_a', 'pelanggaran_november_a', 'pelanggaran_desember_a',
        'pelanggaran_januari_b', 'pelanggaran_februari_b', 'pelanggaran_maret_b', 'pelanggaran_april_b', 'pelanggaran_mei_b', 'pelanggaran_juni_b', 'pelanggaran_juli_b', 'pelanggaran_agustus_b', 'pelanggaran_september_b', 'pelanggaran_oktober_b', 'pelanggaran_november_b', 'pelanggaran_desember_b',
        'pelanggaran_januari_c', 'pelanggaran_februari_c', 'pelanggaran_maret_c', 'pelanggaran_april_c', 'pelanggaran_mei_c', 'pelanggaran_juni_c', 'pelanggaran_juli_c', 'pelanggaran_agustus_c', 'pelanggaran_september_c', 'pelanggaran_oktober_c', 'pelanggaran_november_c', 'pelanggaran_desember_c',
        'pelanggaran_januari_d', 'pelanggaran_februari_d', 'pelanggaran_maret_d', 'pelanggaran_april_d', 'pelanggaran_mei_d', 'pelanggaran_juni_d', 'pelanggaran_juli_d', 'pelanggaran_agustus_d', 'pelanggaran_september_d', 'pelanggaran_oktober_d', 'pelanggaran_november_d', 'pelanggaran_desember_d',
        'pelanggaran_januari_e', 'pelanggaran_februari_e', 'pelanggaran_maret_e', 'pelanggaran_april_e', 'pelanggaran_mei_e', 'pelanggaran_juni_e', 'pelanggaran_juli_e', 'pelanggaran_agustus_e', 'pelanggaran_september_e', 'pelanggaran_oktober_e', 'pelanggaran_november_e', 'pelanggaran_desember_e',
        'pelanggaran_januari_f', 'pelanggaran_februari_f', 'pelanggaran_maret_f', 'pelanggaran_april_f', 'pelanggaran_mei_f', 'pelanggaran_juni_f', 'pelanggaran_juli_f', 'pelanggaran_agustus_f', 'pelanggaran_september_f', 'pelanggaran_oktober_f', 'pelanggaran_november_f', 'pelanggaran_desember_f',
        'totalpelanggaran_januari', 'totalpelanggaran_februari', 'totalpelanggaran_maret', 'totalpelanggaran_april', 'totalpelanggaran_mei', 'totalpelanggaran_juni', 'totalpelanggaran_juli', 'totalpelanggaran_agustus', 'totalpelanggaran_september', 'totalpelanggaran_oktober', 'totalpelanggaran_november', 'totalpelanggaran_desember',
        'perizinan_januari_a', 'perizinan_februari_a', 'perizinan_maret_a', 'perizinan_april_a', 'perizinan_mei_a', 'perizinan_juni_a', 'perizinan_juli_a', 'perizinan_agustus_a', 'perizinan_september_a', 'perizinan_oktober_a', 'perizinan_november_a', 'perizinan_desember_a',
        'perizinan_januari_b', 'perizinan_februari_b', 'perizinan_maret_b', 'perizinan_april_b', 'perizinan_mei_b', 'perizinan_juni_b', 'perizinan_juli_b', 'perizinan_agustus_b', 'perizinan_september_b', 'perizinan_oktober_b', 'perizinan_november_b', 'perizinan_desember_b',
        'perizinan_januari_c', 'perizinan_februari_c', 'perizinan_maret_c', 'perizinan_april_c', 'perizinan_mei_c', 'perizinan_juni_c', 'perizinan_juli_c', 'perizinan_agustus_c', 'perizinan_september_c', 'perizinan_oktober_c', 'perizinan_november_c', 'perizinan_desember_c',
        'perizinan_januari_d', 'perizinan_februari_d', 'perizinan_maret_d', 'perizinan_april_d', 'perizinan_mei_d', 'perizinan_juni_d', 'perizinan_juli_d', 'perizinan_agustus_d', 'perizinan_september_d', 'perizinan_oktober_d', 'perizinan_november_d', 'perizinan_desember_d',
        'perizinan_januari_e', 'perizinan_februari_e', 'perizinan_maret_e', 'perizinan_april_e', 'perizinan_mei_e', 'perizinan_juni_e', 'perizinan_juli_e', 'perizinan_agustus_e', 'perizinan_september_e', 'perizinan_oktober_e', 'perizinan_november_e', 'perizinan_desember_e',
        'perizinan_januari_f', 'perizinan_februari_f', 'perizinan_maret_f', 'perizinan_april_f', 'perizinan_mei_f', 'perizinan_juni_f', 'perizinan_juli_f', 'perizinan_agustus_f', 'perizinan_september_f', 'perizinan_oktober_f', 'perizinan_november_f', 'perizinan_desember_f',
        'totalperizinan_januari', 'totalperizinan_februari', 'totalperizinan_maret', 'totalperizinan_april', 'totalperizinan_mei', 'totalperizinan_juni', 'totalperizinan_juli', 'totalperizinan_agustus', 'totalperizinan_september', 'totalperizinan_oktober', 'totalperizinan_november', 'totalperizinan_desember'));
    }
}
