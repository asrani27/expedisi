<?php

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

Route::get('/', function () {
    return view('logistic');
});

Route::get('/adminlogin', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/tracking', 'TrackingControll@tracking');

Route::get('/barang', 'BarangControll@index');
Route::get('/barang/create', 'BarangControll@create');
Route::post('/barang/insert', 'BarangControll@insert')->name('savebar');
Route::get('/barang/{id}/delete', 'BarangControll@delete');
Route::get('/barang/{id}/edit', 'BarangControll@edit');
Route::post('/barang/{id}/update', 'BarangControll@update')->name('editbar');

Route::get('/biaya', 'BiayaController@index');
Route::get('/biaya/create', 'BiayaController@create');
Route::post('/biaya/insert', 'BiayaController@insert')->name('savebiaya');
Route::get('/biaya/{id}/delete', 'BiayaController@delete');
Route::get('/biaya/{id}/edit', 'BiayaController@edit');
Route::post('/biaya/{id}/update', 'BiayaController@update')->name('editbiaya');

Route::get('/jabatan', 'JabatanControll@index');
Route::get('/jabatan/create', 'JabatanControll@create');
Route::post('/jabatan/insert', 'JabatanControll@insert')->name('savejab');
Route::get('/jabatan/{id}/delete', 'JabatanControll@delete');
Route::get('/jabatan/{id}/edit', 'JabatanControll@edit');
Route::post('/jabatan/{id}/update', 'JabatanControll@update')->name('editjab');

Route::get('/petugas', 'PetugasController@index');
Route::get('/petugas/create', 'PetugasController@create');
Route::post('/petugas/insert', 'PetugasController@insert')->name('savepetugas');
Route::get('/petugas/{id}/delete', 'PetugasController@delete');
Route::get('/petugas/{id}/edit', 'PetugasController@edit');
Route::post('/petugas/{id}/update', 'PetugasController@update')->name('editpetugas');

Route::get('/user', 'UserControll@index');
Route::get('/user/create', 'UserControll@create');
Route::post('/user/insert', 'UserControll@insert')->name('simpanuser');
Route::get('/user/{nis}/delete', 'UserControll@delete');
Route::get('/user/{nis}/edit', 'UserControll@edit');
Route::post('/user/{nis}/update', 'UserControll@update')->name('edituser');

Route::get('/kantor', 'KantorControll@index');
Route::get('/kantor/create', 'KantorControll@create');
Route::post('/kantor/insert', 'KantorControll@insert')->name('simpankantor');
Route::get('/kantor/{nis}/delete', 'KantorControll@delete');
Route::get('/kantor/{nis}/edit', 'KantorControll@edit');
Route::post('/kantor/{nis}/update', 'KantorControll@update')->name('editkantor');

Route::get('/pengiriman', 'PengirimanControll@kirim');
Route::get('/penerimaan', 'PengirimanControll@penerimaan');
Route::get('/pengambilan', 'PengirimanControll@pengambilan');
Route::get('/pengiriman/resi/{resi}', 'PengirimanControll@daftarkirim');
Route::post('/pengiriman/insert', 'PengirimanControll@insert')->name('simpankirim');
Route::get('/pengiriman/reset/{id}', 'PengirimanControll@reset');
Route::post('/pengiriman/selesai', 'PengirimanControll@selesai')->name('selesai');
Route::post('/pengiriman/tambahbarang', 'PengirimanControll@tambah')->name('tambahbarang');
Route::get('/pengiriman/remove/{rowId}/{id}', 'PengirimanControll@deletepengiriman');
Route::get('/pengiriman/daftar', 'PengirimanControll@daftarpengiriman');
Route::get('/pengiriman/{id}/detail', 'PengirimanControll@detail');
Route::get('/pengiriman/{id}/terima', 'PengirimanControll@terima');
Route::get('/pengiriman/{id}/ambil', 'PengirimanControll@ambil');
Route::get('/pengiriman/{id}/delete', 'PengirimanControll@delete');

Route::get('/laporan1', 'LaporanControll@index1');
Route::post('/laporan1/cetak', 'LaporanControll@cetak1')->name('cetak1');
Route::get('/laporan2', 'LaporanControll@index2');
Route::post('/laporan2/cetak', 'LaporanControll@cetak2')->name('cetak2');
Route::get('/laporan3', 'LaporanControll@index3');
Route::post('/laporan3/cetak', 'LaporanControll@cetak3')->name('cetak3');
Route::get('/laporan4', 'LaporanControll@index4');
Route::post('/laporan4/cetak', 'LaporanControll@cetak4')->name('cetak4');
Route::get('/laporan5', 'LaporanControll@index5');
Route::post('/laporan5/cetak', 'LaporanControll@cetak5')->name('cetak5');
Route::get('/laporan6', 'LaporanControll@index6');
Route::post('/laporan6/cetak', 'LaporanControll@cetak6')->name('cetak6');
Route::get('/laporan7', 'LaporanControll@index7');
Route::post('/laporan7/cetak', 'LaporanControll@cetak7')->name('cetak7');
Route::get('/laporan8', 'LaporanControll@index8');
Route::get('/laporan8/{id}/cetak', 'LaporanControll@cetak8');
Route::get('/laporan9', 'LaporanControll@index9');
Route::post('/laporan9/cetak', 'LaporanControll@cetak9')->name('cetak9');
