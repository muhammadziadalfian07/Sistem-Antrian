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

Route::get('/', 'LandingController@index')->name('landing.home');
Route::get('/pesan/cetak/{id}', 'PasienController@cetakAntrian')->name('pasien.cetak');
Route::post('/pasien/daftar', 'PasienController@daftar')->name('pasien.daftar');
Route::Post('/pesan/kirim', 'PesanController@store')->name('pesan.store');


Route::group(['middleware' => 'auth'], function () {


    //yang memiliki role admin
    Route::group(['middleware' => ['role:admin']], function () {
        //role
        Route::resource('/role', 'RoleController')->except([
            'create', 'show', 'edit', 'update'
        ]);

        //users
        Route::resource('/users', 'UserController')->except([
            'show'
        ]);
        Route::get('/users/aktifkan/{id}', 'UserController@aktif')->name('users.aktifkan');
        Route::get('/users/suspend/{id}', 'UserController@suspend')->name('users.suspend');
        Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
        Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.role_permission');
        Route::post('/user/permission', 'UserController@addPermission')->name('users.add_permission');
        Route::get('/user/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
        Route::put('/user/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
    });

    Route::group(['middleware' => ['permission:create|update|delete|show']], function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('/jamkes', 'JamkesController');
        Route::resource('/dokter', 'DokterController');

        // pasien
        Route::resource('/pasien', 'PasienController');
        Route::get('/cetak_pdf', ['uses' => 'PasienController@cetak_pdf', 'as' => 'pasien.cetak_pdf']);
        Route::delete('/truncate/pasien', 'PasienController@truncate')->name('pasien.truncate');

        //pesan
        Route::get('/pesan', 'PesanController@index')->name('pesan.index');
        Route::delete('/pesan/hapus/{id}', 'PesanController@destroy')->name('pesan.destroy');
        Route::get('/pesan/show/{id}', 'PesanController@show')->name('pesan.show');

        // antrian
        Route::resource('/antrian', 'AntrianController')->except(['store', 'show', 'edit', 'update']);
        Route::get('/antrian/panggil/{id}', 'AntrianController@panggil')->name('antrian.tampil');
        Route::get('/antrian/cancel/{id}', 'AntrianController@cancel')->name('antrian.cancel');
        Route::get('/antrian/terpanggil', 'AntrianController@tampil')->name('antrian.view');
        Route::delete('/truncate', 'AntrianController@truncate')->name('antrian.truncate');
    });
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
