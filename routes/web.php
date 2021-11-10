<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
    //return view('home');
//});
Route::get('/', 'HomeController@index');
Route::get('/datasantri', 'DatasantriController@datasantri');

//Login
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

//Middleware Super Admin dan Admin
Route::group(['middleware'=>['auth', 'checkRole:Super Admin,Admin']], function(){

    //Dashboard
    Route::get('dashboard', 'DashboardController@index');

    //Santri
    Route::get('santri', 'SantriController@index');
    Route::post('/santri/store','SantriController@storesantri');
    Route::get('/santri/edit/{id}', 'SantriController@editsantri');
    Route::post('/santri/update','SantriController@updatesantri');
    Route::get('/santri/hapus/{id}','SantriController@hapussantri');
    Route::get('/santri/detail/{id}', 'SantriController@detailsantri');
    Route::post('/santri/kenaikankelas','SantriController@kenaikankelas');
    Route::post('/santri/kelulusan','SantriController@kelulusan');
    Route::post('/santri/import_excel', 'SantriController@import_excel');
    Route::get('/santri/export_excel', 'SantriController@export_excel');
    Route::get('/santri/cetak_pdf', 'SantriController@cetak_pdf');
    Route::get('/santri/detail/{id}/cetakdetail_pdf', 'SantriController@cetakdetail_pdf');

    //Prestasi
    Route::get('prestasi', 'PrestasiController@index');
    Route::post('/prestasi/store','PrestasiController@storeprestasi');
    Route::get('/prestasi/edit/{id}', 'PrestasiController@editprestasi');
    Route::post('/prestasi/update','PrestasiController@updateprestasi');
    Route::get('/prestasi/hapus/{id}','PrestasiController@hapusprestasi');
    Route::get('/prestasi/bukti/{id}', 'PrestasiController@buktiprestasi');
    Route::get('/prestasi/exportprestasi_excel', 'PrestasiController@exportprestasi_excel');
    Route::get('/prestasi/cetakprestasi_pdf', 'PrestasiController@cetakprestasi_pdf');

    //Pelanggaran
    Route::get('pelanggaran', 'PelanggaranController@index');
    Route::post('/pelanggaran/store','PelanggaranController@storepelanggaran');
    Route::get('/pelanggaran/edit/{id}', 'PelanggaranController@editpelanggaran');
    Route::post('/pelanggaran/update','PelanggaranController@updatepelanggaran');
    Route::get('/pelanggaran/hapus/{id}','PelanggaranController@hapuspelanggaran');
    Route::get('/pelanggaran/bukti/{id}', 'PelanggaranController@buktipelanggaran');
    Route::get('/pelanggaran/exportpelanggaran_excel', 'PelanggaranController@exportpelanggaran_excel');
    Route::get('/pelanggaran/cetakpelanggaran_pdf', 'PelanggaranController@cetakpelanggaran_pdf');

    //Perizinan
    Route::get('perizinan', 'PerizinanController@index');
    Route::get('/perizinan/filterperizinan', 'PerizinanController@filterperizinan');
    Route::post('/perizinan/store','PerizinanController@storeperizinan');
    Route::get('/perizinan/edit/{id}', 'PerizinanController@editperizinan');
    Route::post('/perizinan/update','PerizinanController@updateperizinan');
    Route::get('/perizinan/hapus/{id}','PerizinanController@hapusperizinan');
    Route::get('/perizinan/bukti/{id}', 'PerizinanController@buktiperizinan');
    Route::get('/perizinan/exportperizinan_excel', 'PerizinanController@exportperizinan_excel');
    Route::get('/perizinan/cetakperizinan_pdf', 'PerizinanController@cetakperizinan_pdf');

    //Profile
    Route::get('profile', 'ProfileController@index');
    Route::post('profile', 'ProfileController@gantipassword')->name('gantipassword');
});

//Middleware Admin
Route::group(['middleware'=>['auth', 'checkRole:Super Admin']], function(){

    //Ekstra Data
    Route::get('ekstradata', 'EkstradataController@index');
    Route::post('/ekstradata/storetahunajaran', 'EkstradataController@storetahunajaran');
    Route::get('/ekstradata/tahunajaran/hapus/{id}','EkstradataController@hapustahunajaran');
    Route::post('/ekstradata/storekelas', 'EkstradataController@storekelas');
    Route::get('/ekstradata/kelas/hapus/{id}','EkstradataController@hapuskelas');
    
    //Users
    Route::get('users', 'UsersController@index');
    Route::post('/user/store','UsersController@storeuser');
    Route::get('/users/edit/{username}', 'UsersController@edituser');
    Route::post('/users/update','UsersController@updateuser');
    Route::get('/users/hapus/{username}','UsersController@hapususer');
    Route::get('/users/detail/{username}', 'UsersController@detailuser');
});