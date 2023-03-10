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
    Route::get('peserta/{id}', 'DaftarKelas@peserta')->name('admin-peserta-kelas');
    Route::resource('daftar-kelas', 'DaftarKelas');

    // menu admin gambar
    Route::get('gambar-kegiatan-kelas', 'GambarKegiatanKelasController@index')->name('gambar-kegiatan-kelas');
    Route::get('gambar-kegiatan-kelas/add', 'GambarKegiatanKelasController@create')->name('add-gambar-kegiatan-kelas');
    Route::post('gambar-kegiatan-kelas/add', 'GambarKegiatanKelasController@store')->name('store-gambar-kegiatan-kelas');
    Route::get('gambar-kegiatan-kelas/{id}/gambar', 'GambarKegiatanKelasController@detail_gambar')->name('detail-gambar-kegiatan-kelas');
    Route::get('gambar-kegiatan-kelas/{id}/edit-gambar', 'GambarKegiatanKelasController@edit')->name('edit-gambar-kegiatan-kelas');
    Route::patch('gambar-kegiatan-kelas/{id}', 'GambarKegiatanKelasController@update')->name('update-gambar-kegiatan-kelas');
    Route::delete('delete-gambar-kegiatan-kelas/{id}', 'GambarKegiatanKelasController@destroy')->name('delete-gambar-kegiatan-kelas');


    // menu admin list member
    Route::get('list-member', 'ListMemberController@index')->name('list-member');
    Route::get('list-member/add', 'ListMemberController@create')->name('add-list-member');
    Route::post('list-member/add', 'ListMemberController@store')->name('store-list-member');
    Route::get('list-member/{id}/kelas_member', 'ListMemberController@detail_member')->name('detail-list-member');
    Route::get('list-member/{id}/edit-gambar', 'ListMemberController@edit')->name('edit-list-member');
    Route::get('list-member/{id}/edit-role', 'ListMemberController@editrole')->name('edit-role-list-member');
    Route::patch('list-member/{id}', 'ListMemberController@update')->name('update-list-member');
    Route::patch('list-member/role/{id}', 'ListMemberController@updaterole')->name('update-role-list-member');
    Route::delete('delete-list-member/{id}', 'ListMemberController@destroy')->name('delete-list-member');
    Route::get('cari-list-member/cari', 'ListMemberController@cari')->name('cari-list-member');

// laporan data kelas
    Route::get('data-kelas', 'LaporanDataKelasController@index')->name('data-kelas');
    Route::get('data-kelas/add', 'LaporanDataKelasController@create')->name('add-data-kelas');
    Route::post('data-kelas/add', 'LaporanDataKelasController@store')->name('store-data-kelas');
    Route::get('data-kelas/{id}/peserta', 'LaporanDataKelasController@detail_member')->name('detail-data-kelas');
    Route::get('data-kelas/{id}/edit-kelas', 'LaporanDataKelasController@edit')->name('edit-data-kelas');
    Route::patch('data-kelas/{id}/update-payment-status', 'LaporanDataKelasController@update_payment')->name('update_payment_status');
    Route::patch('data-kelas/{id}', 'LaporanDataKelasController@update')->name('update-data-kelas');
    Route::get('data-kelas/{id}/edit-sertif', 'LaporanDataKelasController@edit_sertif')->name('edit-sertif-data-kelas');
    Route::patch('data-kelas/{id}', 'LaporanDataKelasController@update_sertif')->name('update-sertif-data-kelas');
    Route::delete('delete-data-kelas/{id}', 'LaporanDataKelasController@destroy')->name('delete-data-kelas');
    Route::get('cari-data-kelas/cari', 'LaporanDataKelasController@cari')->name('cari-data-kelas');


// laporan peserta kelas
    Route::get('peserta-kelas', 'PesertaKelasController@index')->name('peserta-kelas');
    Route::get('peserta-kelas/add', 'PesertaKelasController@create')->name('add-peserta-kelas');
    Route::post('peserta-kelas/add', 'PesertaKelasController@store')->name('store-peserta-kelas');
    Route::get('peserta-kelas/{id}/kelas-peserta', 'PesertaKelasController@detail_member')->name('detail-peserta-kelas');
    Route::get('peserta-kelas/{id}/edit-kelas', 'PesertaKelasController@edit')->name('edit-peserta-kelas');
    Route::patch('peserta-kelas/{id}/update-payment-status', 'PesertaKelasController@update_payment')->name('update_payment_status');
    Route::patch('peserta-kelas/{id}', 'PesertaKelasController@update')->name('update-peserta-kelas');
    Route::get('peserta-kelas/{id}/edit-sertif', 'PesertaKelasController@edit_sertif')->name('edit-sertif-peserta-kelas');
    Route::patch('peserta-kelas/{id}', 'PesertaKelasController@update_sertif')->name('update-sertif-peserta-kelas');
    Route::delete('delete-peserta-kelas/{id}', 'PesertaKelasController@destroy')->name('delete-peserta-kelas');
    Route::get('cari-peserta-kelas/cari', 'PesertaKelasController@cari')->name('cari-peserta-kelas');


    // export export
    Route::get('dashboard-admin/user/export_excel', 'ExportUserController@export_excel')->name('admin-export-user');
    Route::get('dashboard-admin/user/export_nonuser', 'ExportUserController@export_nonuser')->name('admin-export-nonuser');
    Route::get('dashboard-admin/jadwal/export_excel', 'ExportUserController@jadwal_export_excel')->name('admin-export-jadwal');
    Route::get('dashboard-admin/peserta/export_excel', 'ExportUserController@peserta_export_excel')->name('admin-export-peserta');
    Route::get('dashboard-admin/kelas-peserta/export_excel/{id}', 'ExportUserController@kelaspeserta_export_excel')->name('kelas-peserta-export');
    Route::get('dashboard-admin/pembayaranlunas/export_excel', 'ExportUserController@filterpembayaran_export_excel')->name('admin-export-pembayaran');
    Route::get('dashboard-admin/pembayaranbelumlunas/export_excel', 'ExportUserController@belumlunas_export_excel')->name('admin-export-pembayaranbelumlunas');
    Route::get('dashboard-admin/jeniskelas/export_excel/{id}', 'ExportUserController@jeniskelas_export_excel')->name('admin-export-jeniskelas');
    Route::get('dashboard-admin/historypeserta/export_excel', 'ExportUserController@historypeserta_export_excel')->name('admin-export-history');
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
    Route::get('profile/{id}/edit-profile', 'UserController@profile')->name('edit-profile');
    Route::patch('profile/{id}', 'UserController@profile_update')->name('update-profile');
});

Route::group(['middleware' => ['auth', 'topmanajemen']], function() {
    // laporan data kelas
    Route::get('/dashboard-topmanajemen', 'TopManajemenController@index')->name('dashboard-topmanajemen');
    Route::get('data-kelas-topmanajemen/add', 'TopManajemenController@create')->name('add-data-kelas-topmanajemen');
    Route::post('data-kelas-topmanajemen/add', 'TopManajemenController@store')->name('store-data-kelas-topmanajemen');
    Route::get('data-kelas-topmanajemen/{id}/peserta', 'TopManajemenController@detail_member')->name('detail-data-kelas-topmanajemen');
    Route::get('data-kelas-topmanajemen/{id}/edit-kelas', 'TopManajemenController@edit')->name('edit-data-kelas-topmanajemen');
    Route::patch('data-kelas-topmanajemen/{id}/update-payment-status', 'TopManajemenController@update_payment')->name('update_payment_status-topmanajemen');
    Route::patch('data-kelas-topmanajemen/{id}', 'TopManajemenController@update')->name('update-data-kelas-topmanajemen');
    Route::get('data-kelas-topmanajemen/{id}/edit-sertif', 'TopManajemenController@edit_sertif')->name('edit-sertif-data-kelas-topmanajemen');
    Route::patch('data-kelas-topmanajemen/{id}', 'TopManajemenController@update_sertif')->name('update-sertif-data-kelas-topmanajemen');
    Route::delete('delete-data-kelas-topmanajemen/{id}', 'TopManajemenController@destroy')->name('delete-data-kelas-topmanajemen');
    Route::get('cari-data-kelas-topmanajemen/cari', 'TopManajemenController@cari')->name('cari-data-kelas-topmanajemen');


    // laporan peserta kelas
    Route::get('peserta-kelas-topmanajemen', 'TopmanajemenController@index_topmanajemen')->name('peserta-kelas-topmanajemen');
    Route::get('peserta-kelas-topmanajemen/add', 'TopmanajemenController@create_topmanajemen')->name('add-peserta-kelas-topmanajemen');
    Route::post('peserta-kelas-topmanajemen/add', 'TopmanajemenController@store_topmanajemen')->name('store-peserta-kelas-topmanajemen');
    Route::get('peserta-kelas-topmanajemen/{id}/kelas-peserta', 'TopmanajemenController@detail_member_topmanajemen')->name('detail-peserta-kelas-topmanajemen');
    Route::get('peserta-kelas-topmanajemen/{id}/edit-kelas', 'TopmanajemenController@edit_topmanajemen')->name('edit-peserta-kelas-topmanajemen');
    Route::patch('peserta-kelas-topmanajemen/{id}/update-payment-status', 'TopmanajemenController@update_payment_topmanajemen')->name('update_payment_status-topmanajemen');
    Route::patch('peserta-kelas-topmanajemen/{id}', 'TopmanajemenController@update_topmanajemen')->name('update-peserta-kelas-topmanajemen');
    Route::get('peserta-kelas-topmanajemen/{id}/edit-sertif', 'TopmanajemenController@edit_sertif_topmanajemen')->name('edit-sertif-peserta-kelas-topmanajemen');
    Route::patch('peserta-kelas-topmanajemen/{id}', 'TopmanajemenController@update_sertif_topmanajemen')->name('update-sertif-peserta-kelas-topmanajemen');
    Route::delete('delete-peserta-kelas-topmanajemen/{id}', 'TopmanajemenController@destroy_topmanajemen')->name('delete-peserta-kelas-topmanajemen');
    Route::get('cari-peserta-kelas-topmanajemen/cari', 'TopmanajemenController@cari_topmanajemen')->name('cari-peserta-kelas-topmanajemen');

    // export export
    Route::get('dashboard-topmanajemen/user/export_excel', 'ExportUserController@export_excel')->name('topmanajemen-export-user');
    Route::get('dashboard-topmanajemen/user/export_nonuser', 'ExportUserController@export_nonuser')->name('topmanajemen-export-nonuser');
    Route::get('dashboard-topmanajemen/jadwal/export_excel', 'ExportUserController@jadwal_export_excel')->name('topmanajemen-export-jadwal');
    Route::get('dashboard-topmanajemen/peserta/export_excel', 'ExportUserController@peserta_export_excel')->name('topmanajemen-export-peserta');
    Route::get('dashboard-topmanajemen/kelas-peserta/export_excel/{id}', 'ExportUserController@kelaspeserta_export_excel')->name('topmanajemen-kelas-peserta-export');
    Route::get('dashboard-topmanajemen/pembayaranlunas/export_excel', 'ExportUserController@filterpembayaran_export_excel')->name('topmanajemen-export-pembayaran');
    Route::get('dashboard-topmanajemen/pembayaranbelumlunas/export_excel', 'ExportUserController@belumlunas_export_excel')->name('topmanajemen-export-pembayaranbelumlunas');
    Route::get('dashboard-topmanajemen/jeniskelas/export_excel/{id}', 'ExportUserController@jeniskelas_export_excel')->name('topmanajemen-export-jeniskelas');
    Route::get('dashboard-topmanajemen/historypeserta/export_excel', 'ExportUserController@historypeserta_export_excel')->name('topmanajemen-export-history');
});



Route::group(['middleware' => ['auth', 'adminweb']], function() {
    Route::get('/dashboard-adminweb', 'AdminWebController@index')->name('dashboard-adminweb');
    Route::get('/dashboard-adminweb/cari', 'AdminWebController@cari')->name('dashboard-adminweb-search');
    Route::get('/dashboard-adminweb/add', 'AdminWebController@create')->name('dashboard-adminweb-add');
    Route::post('/dashboard-adminweb/add', 'AdminWebController@store')->name('dashboard-adminweb-store');
    Route::get('/dashboard-adminweb/{id}/edit', 'AdminWebController@edit')->name('dashboard-adminweb-edit');
    Route::patch('/dashboard-adminweb/{id}', 'AdminWebController@update')->name('dashboard-adminweb-update');
    Route::delete('/dashboard-adminweb/{id}', 'AdminWebController@destroy')->name('dashboard-adminweb-delete');
    Route::get('/dashboard-adminweb/{id}/kelas_member', 'AdminWebController@detail_member')->name('dashboard-adminweb-detail-list-member');
    Route::get('dashboard-adminweb/user/export_excel', 'ExportUserController@export_excel')->name('adminweb-export-user');
    Route::get('dashboard-adminweb/nonuser/export_excel', 'ExportUserController@export_nonuser')->name('adminweb-export-nonuser');
    Route::get('dashboard-adminweb/jadwal/export_excel', 'ExportUserController@jadwal_export_excel')->name('adminweb-export-jadwal');
    Route::get('dashboard-adminweb/peserta/export_excel', 'ExportUserController@peserta_export_excel')->name('adminweb-export-peserta');
});



Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@contactUs')->name('contactUs');
Route::get('/kelas', 'HomeController@kelas')->name('kelas');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('/contact', 'HomeController@contact')->name('contact');
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
