<?php

use Illuminate\Support\Facades\Route;

Route::get('/', '\App\Http\Controllers\showController@tampilHomepage')->name('/');
Route::get('dashboard', '\App\Http\Controllers\showController@tampilDashboard')->name('dashboard');

Route::get('infoMahasiswa/{id}', '\App\Http\Controllers\showController@tampilInformasi')->name('infoMahasiswa');

Route::get('rincian', '\App\Http\Controllers\showController@tampilRincian')->name('rincian');

Route::get('login', '\App\Http\Controllers\showController@tampilFormLogin')->name('login');
Route::post('login', '\App\Http\Controllers\authController@userLogin');

Route::get('logout', '\App\Http\Controllers\authController@logout')->name('logout');

Route::get('akunSet', '\App\Http\Controllers\showController@tampilSettingAkun')->name('akunSet');
Route::post('akunSet', '\App\Http\Controllers\authController@ubahSetAkun');

Route::get('ubahPass', '\App\Http\Controllers\showController@tampilubahPass')->name('ubahPass');
Route::post('ubahPass', '\App\Http\Controllers\authController@ubahPassword');

Route::get('inputMahasiswa', '\App\Http\Controllers\showController@tampilInputMahasiswa')->name('inputMahasiswa');
Route::post('inputMahasiswa', '\App\Http\Controllers\insertController@import');

Route::get('hapusInputMhs/{id}', '\App\Http\Controllers\insertController@deleteInputMhs')->name('hapusInputMhs');

Route::get('exportExcel', '\App\Http\Controllers\insertController@export')->name('exportExcel');
Route::get('inputTbl', '\App\Http\Controllers\insertController@inputTbl')->name('inputTbl');

Route::get('lihatLaporan', '\App\Http\Controllers\showController@tampilLihatLaporan')->name('lihatLaporan');
Route::get('lihatLaporan/{tanggal}', '\App\Http\Controllers\showController@tampilLihatLaporanDay');
Route::get('rincianLaporan/{id}', '\App\Http\Controllers\showController@tampilRincianLaporan')->name('rincianLaporan');
Route::post('verifikasiLaporan/{id}', '\App\Http\Controllers\authController@verifikasiLaporan');
Route::get('buatLaporan/{tanggal}', '\App\Http\Controllers\showController@tampilBuatLaporan')->name('buatLaporan');

Route::get('inputLaporan', '\App\Http\Controllers\showController@tampilInputLaporan')->name('inputLaporan');
Route::get('inputLaporan/{id}', '\App\Http\Controllers\showController@tampilInputLaporan1');
Route::post('masukLaporan', '\App\Http\Controllers\authController@masukkanLaporan')->name('masukLaporan');

Route::get('LoginAdmin', '\App\Http\Controllers\showController@tampilLoginAdmin')->name('LoginAdmin');
Route::post('LoginAdmin', '\App\Http\Controllers\authController@adminLogin');

Route::get('AdminPage', '\App\Http\Controllers\showController@tampilAdminPage')->name('AdminPage');
Route::get('logoutAdmin', '\App\Http\Controllers\authController@logoutAdmin')->name('logoutAdmin');

Route::get('getMahasiswa', '\App\Http\Controllers\showController@tampilGetMahasiswa')->name('getMahasiswa');
Route::get('getPembimbing', '\App\Http\Controllers\showController@tampilGetPembimbing')->name('getPembimbing');
Route::get('addPembimbing', '\App\Http\Controllers\showController@tampilAddPembimbing')->name('addPembimbing');

Route::get('hapusMhs/{id}', '\App\Http\Controllers\authController@deleteMhs')->name('hapusMhs');
Route::get('hapusPmb/{id}', '\App\Http\Controllers\authController@deletePmb')->name('hapusPmb');

Route::get('AdminUbahMhs/{id}', '\App\Http\Controllers\showController@tampilAdminUbahMahasiswa')->name('AdminUbahMhs');
Route::post('AdminUbahMhs', '\App\Http\Controllers\authController@AdminUbahMhs');

Route::get('AdminUbahPmb/{id}', '\App\Http\Controllers\showController@tampilAdminUbahPembimbing')->name('AdminUbahPmb');
Route::post('AdminUbahPmb', '\App\Http\Controllers\authController@AdminUbahPmb');

Route::post('TambahPembimbing', '\App\Http\Controllers\authController@AddPembimbing');

Route::post('unduhSurat', '\App\Http\Controllers\insertController@unduhSurat')->name('unduhSurat');
