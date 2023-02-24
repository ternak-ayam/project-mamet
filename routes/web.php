<?php

use App\Http\Controllers\PembelianController;
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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::resource('dashboard-admin', 'AdminController');
    Route::resource('daftar-kelas', 'DaftarKelas');
    Route::get('dashboard-admin/user/export_excel', 'ExportUserController@export_excel')->name('admin-export-user');
    Route::get('dashboard-admin/user/export_nonuser', 'ExportUserController@export_nonuser')->name('admin-export-nonuser');
    Route::get('dashboard-admin/jadwal/export_excel', 'ExportUserController@jadwal_export_excel')->name('admin-export-jadwal');
    Route::get('dashboard-admin/peserta/export_excel', 'ExportUserController@peserta_export_excel')->name('admin-export-peserta');
    Route::get('jadwal-kelas', 'JadwalKelasController@index')->name('jadwal-kelas');
    Route::get('jadwal-kelas/cari', 'JadwalKelasController@cari')->name('cari-jadwal-kelas');
});


Route::group(['middleware' => ['auth', 'user']], function() {
    Route::get('/dashboard-user', 'UserController@index')->name('dashboard-user');
    Route::get('/dashboard-user/cetak-pdf/{id}', 'UserController@cetakPdf')->name('dashboard-user-cetak');
    Route::get('/dashboard-user/cetak-sertif/{id}', 'UserController@cetakSertifikat')->name('dashboard-user-sertifikat');
    Route::patch('/dashboard-user/update-bukti-pembayaran/{id}', 'UserController@updateBuktiPembayaran')->name('dashboard-user-update-bp');
    Route::get('/dashboard-user/update-bukti-pembayaran/{id}/edit', 'UserController@updatebpview')->name('dashboard-user-view-update-bp');
    Route::get('/jadwal-kelas-user', 'UserController@jadwal_kelas')->name('jadwal-kelas-user');
});

Route::group(['middleware' => ['auth', 'topmanajemen']], function() {
    Route::get('/dashboard-topmanajemen', 'TopManajemenController@index')->name('dashboard-topmanajemen');
    Route::get('/dashboard-topmanajemen/cari', 'TopManajemenController@cari')->name('dashboard-topmanajemen-search');
    Route::get('dashboard-topmanajemen/user/export_excel', 'ExportUserController@export_excel')->name('top-manajemen-export-user');
    Route::get('dashboard-topmanajemen/nonuser/export_excel', 'ExportUserController@export_nonuser')->name('top-manajemen-export-nonuser');
    Route::get('dashboard-topmanajemen/jadwal/export_excel', 'ExportUserController@jadwal_export_excel')->name('top-manajemen-export-jadwal');
    Route::get('dashboard-topmanajemen/peserta/export_excel', 'ExportUserController@peserta_export_excel')->name('top-manajemen-export-peserta');
});



Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@contactUs')->name('contactUs');
Route::get('/data-diri/{id}', 'HomeController@filldatadiri')->name('datadiri');
Route::post('/data-diri', 'HomeController@storedatadiri')->name('storedatadiri');


Route::get('dashboard-nonuser','HomeController@dashboardNonUser')->name('dashboard-nonuser');
Route::get('dashboard-nonuser/register','HomeController@viewregisterNonUser')->name('view-register-nonuser');
Route::patch('dashboard-nonuser/register','HomeController@registerNonUser')->name('register-nonuser');


Route::get('/detail-product/{id}', 'HomeController@show')->name('detail-product');
Route::get('checkout/create/{id}', [
    'as' => 'checkout.create',
    'uses' => 'PembelianController@create'
]);
Route::resource('checkout', 'PembelianController', ['except' => 'create']);
