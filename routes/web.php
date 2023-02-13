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
});


Route::group(['middleware' => ['auth', 'user']], function() {
    Route::get('/dashboard-user', 'UserController@index')->name('dashboard-user');
    Route::get('/dashboard-user/cetak-pdf/{id}', 'UserController@cetakPdf')->name('dashboard-user-cetak');
    Route::get('/dashboard-user/cetak-sertif/{id}', 'UserController@cetakSertifikat')->name('dashboard-user-sertifikat');
    Route::patch('/dashboard-user/update-bukti-pembayaran/{id}', 'UserController@updateBuktiPembayaran')->name('dashboard-user-update-bp');
    Route::get('/dashboard-user/update-bukti-pembayaran/{id}/edit', 'UserController@updatebpview')->name('dashboard-user-view-update-bp');
});



Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@contactUs')->name('contactUs');


Route::get('/detail-product/{id}', 'HomeController@show')->name('detail-product');
Route::get('checkout/create/{id}', [
    'as' => 'checkout.create',
    'uses' => 'PembelianController@create'
]);
Route::resource('checkout', 'PembelianController', ['except' => 'create']);
