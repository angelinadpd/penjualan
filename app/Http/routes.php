<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/layouts.app', function () {
    return view('layouts.app');
});
Route::get('/laporans.default', function () {
    return view('laporans.default');
});

Route::auth();

Route::group(['middleware' => ['auth']], function() {

	Route::get('/home', 'HomeController@index');

// USERS
	Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
	Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
	Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
	Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
	Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);

//ROLES
	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

//BARANGS
	Route::get('barangs',['as'=>'barangs.index','uses'=>'BarangController@index','middleware' => ['permission:barang-list|barang-create|barang-edit|barang-delete']]);
	Route::get('barangs/create',['as'=>'barangs.create','uses'=>'BarangController@create','middleware' => ['permission:barang-create']]);
	Route::post('barangs/create',['as'=>'barangs.store','uses'=>'BarangController@store','middleware' => ['permission:barang-create']]);
	Route::get('barangs/{idbarang}',['as'=>'barangs.show','uses'=>'BarangController@show']);
	Route::get('barangs/{idbarang}/edit',['as'=>'barangs.edit','uses'=>'BarangController@edit','middleware' => ['permission:barang-edit']]);
	Route::patch('barangs/{idbarang}',['as'=>'barangs.update','uses'=>'BarangController@update','middleware' => ['permission:barang-edit']]);
	Route::delete('barangs/{idbarang}',['as'=>'barangs.show','uses'=>'BarangController@destroy','middleware' => ['permission:barang-delete']]);

//PEMBELIS
	Route::get('pembelis',['as'=>'pembelis.index','uses'=>'PembeliController@index','middleware' => ['permission:pembeli-list|pembeli-create|pembeli-edit|pembeli-delete']]);
	Route::get('pembelis/create',['as'=>'pembelis.create','uses'=>'PembeliController@create','middleware' => ['permission:pembeli-create']]);
	Route::post('pembelis/create',['as'=>'pembelis.store','uses'=>'PembeliController@store','middleware' => ['permission:pembeli-create']]);
	Route::get('pembelis/{idpembeli}',['as'=>'pembelis.show','uses'=>'PembeliController@show']);
	Route::get('pembelis/{idpembeli}/edit',['as'=>'pembelis.edit','uses'=>'PembeliController@edit','middleware' => ['permission:pembeli-edit']]);
	Route::patch('pembelis/{idpembeli}',['as'=>'pembelis.update','uses'=>'PembeliController@update','middleware' => ['permission:pembeli-edit']]);
	Route::delete('pembelis/{idpembeli}',['as'=>'pembelis.show','uses'=>'PembeliController@destroy','middleware' => ['permission:pembeli-delete']]);

//SUPPLIERS
	Route::get('suppliers',['as'=>'suppliers.index','uses'=>'SupplierController@index','middleware' => ['permission:supplier-list|supplier-create|supplier-edit|supplier-delete']]);
	Route::get('suppliers/create',['as'=>'suppliers.create','uses'=>'SupplierController@create','middleware' => ['permission:supplier-create']]);
	Route::post('suppliers/create',['as'=>'suppliers.store','uses'=>'SupplierController@store','middleware' => ['permission:supplier-create']]);
	Route::get('suppliers/{idsupplier}',['as'=>'suppliers.show','uses'=>'SupplierController@show']);
	Route::get('suppliers/{idsupplier}/edit',['as'=>'suppliers.edit','uses'=>'SupplierController@edit','middleware' => ['permission:supplier-edit']]);
	Route::patch('suppliers/{idsupplier}',['as'=>'suppliers.update','uses'=>'SupplierController@update','middleware' => ['permission:supplier-edit']]);
	Route::delete('suppliers/{idsupplier}',['as'=>'suppliers.show','uses'=>'SupplierController@destroy','middleware' => ['permission:supplier-delete']]);

//PESANS
	Route::get('pesans',['as'=>'pesans.index','uses'=>'PesanController@index','middleware' => ['permission:pesan-list|pesan-create|pesan-edit|pesan-delete']]);
	Route::get('pesans/create',['as'=>'pesans.create','uses'=>'PesanController@create','middleware' => ['permission:pesan-create']]);
	Route::post('pesans/create',['as'=>'pesans.store','uses'=>'PesanController@store','middleware' => ['permission:pesan-create']]);
	Route::get('pesans/{idpesan}',['as'=>'pesans.show','uses'=>'PesanController@show']);
	Route::get('pesans/{idpesan}/edit',['as'=>'pesans.edit','uses'=>'PesanController@edit','middleware' => ['permission:pesan-edit']]);
	Route::patch('pesans/{idpesan}',['as'=>'pesans.update','uses'=>'PesanController@update','middleware' => ['permission:pesan-edit']]);
	Route::delete('pesans/{idpesan}',['as'=>'pesans.show','uses'=>'PesanController@destroy','middleware' => ['permission:pesan-delete']]);

//REALISASIS
	Route::get('realisasis',['as'=>'realisasis.index','uses'=>'RealisasiController@index','middleware' => ['permission:realisasi-list|realisasi-create|realisasi-edit|realisasi-delete']]);
	Route::get('realisasis/create',['as'=>'realisasis.create','uses'=>'RealisasiController@create','middleware' => ['permission:realisasi-create']]);
	Route::post('realisasis/create',['as'=>'realisasis.store','uses'=>'RealisasiController@store','middleware' => ['permission:realisasi-create']]);
	Route::get('realisasis/{idrealisasi}',['as'=>'realisasis.show','uses'=>'RealisasiController@show']);
	Route::get('realisasis/{idrealisasi}/edit',['as'=>'realisasis.edit','uses'=>'RealisasiController@edit','middleware' => ['permission:realisasi-edit']]);
	Route::patch('realisasis/{idrealisasi}',['as'=>'realisasis.update','uses'=>'RealisasiController@update','middleware' => ['permission:realisasi-edit']]);
	Route::delete('realisasis/{idrealisasi}',['as'=>'realisasis.show','uses'=>'RealisasiController@destroy','middleware' => ['permission:realisasi-delete']]);

//PENJUALANS
	Route::get('penjualans',['as'=>'penjualans.index','uses'=>'PenjualanController@index','middleware' => ['permission:penjualan-list|penjualan-create|penjualan-edit|penjualan-delete']]);
	Route::get('penjualans/create',['as'=>'penjualans.create','uses'=>'PenjualanController@create','middleware' => ['permission:penjualan-create']]);
	Route::post('penjualans/create',['as'=>'penjualans.store','uses'=>'PenjualanController@store','middleware' => ['permission:penjualan-create']]);
	Route::get('penjualans/{idpenjualan}',['as'=>'penjualans.show','uses'=>'PenjualanController@show']);
	Route::get('penjualans/{idpenjualan}/edit',['as'=>'penjualans.edit','uses'=>'PenjualanController@edit','middleware' => ['permission:penjualan-edit']]);
	Route::patch('penjualans/{idpenjualan}',['as'=>'penjualans.update','uses'=>'PenjualanController@update','middleware' => ['permission:penjualan-edit']]);
	Route::delete('penjualans/{idpenjualan}',['as'=>'penjualans.show','uses'=>'PenjualanController@destroy','middleware' => ['permission:penjualan-delete']]);

//LAPORAN-PEMESANANS
	Route::get('laporan_pemesanans',['as'=>'laporan_pemesanans.index','uses'=>'LaporanPemesananController@index','middleware' => ['permission:laporan_pemesanan-list|laporan_pemesanan-harian|laporan_pemesanan-mingguan|laporan_pemesanan-bulanan|laporan_pemesanan-tahunan']]);
	Route::get('laporan_pemesanans/harian',['as'=>'laporan_pemesanans.harian','uses'=>'LaporanPemesananController@harian','middleware' => ['permission:laporan_pemesanan-harian']]);
	Route::get('laporan_pemesanans/mingguan',['as'=>'laporan_pemesanans.mingguan','uses'=>'LaporanPemesananController@mingguan','middleware' => ['permission:laporan_pemesanan-mingguan']]);
	Route::get('laporan_pemesanans/bulanan',['as'=>'laporan_pemesanans.bulanan','uses'=>'LaporanPemesananController@bulanan','middleware' => ['permission:laporan_pemesanan-bulanan']]);
	Route::get('laporan_pemesanans/tahunan',['as'=>'laporan_pemesanans.tahunan','uses'=>'LaporanPemesananController@tahunan','middleware' => ['permission:laporan_pemesanan-tahunan']]);

});


