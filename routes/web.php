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
Route::get('/', function() {
    return redirect('login');
});

//Login
Route::get('login', 'AdminLoginController@get_login')->name('login');
Route::post('post-login', 'AdminLoginController@postLogin')->name('postLogin');
Route::get('logout', 'AdminLoginController@logout')->name('logout');
Route::get('statistik','AdminLoginController@statistik_dprd')->name('statistik_dprd');


//Dashboard
Route::get('dashboard','DashboardController@view')->name('dashboard');
Route::get('chart-tol', 'DashboardController@chart_tol')->name('chart_tol');
Route::get('tampil-card','DashboardController@tampil_card')->name('tampil_card');
Route::get('change-kot','DashboardController@change_kot')->name('change_kot');
Route::get('tamp-chart','DashboardController@tamp_chart')->name('tamp_chart');
Route::get('tamp-chartt','DashboardController@tamp_chartt')->name('tamp_chartt');

//Kalkulasi
Route::get('view-partai','partController@view')->name('view_partai');
Route::get('get-provinsi','partController@change_prov')->name('change_prov');
Route::get('hitung-data','partController@hitung_data')->name('hitung_data');

//Master Kursi
Route::get('master_kursi','kursiController@view')->name('master_kursi');
Route::post('save-kursi','kursiController@add_kursi')->name('save_kursi');
Route::get('get-kursi','kursiController@get_data')->name('get_kursi');
Route::post('edit-kursi','kursiController@edit_kursi')->name('edit_kursi');
Route::get('delete-kursi','kursiController@delete_kursi')->name('delete_kursi');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Tampil DPRD
Route::get('view-dprd','dprdController@view')->name('view_dprd');
Route::get('get-dprd','dprdController@tampil_dprd')->name('tampil_dprd');
Route::get('data-prov', 'dprdController@change_data')->name('change_data');

//DPRD Prov Percobaan
Route::get('view-DPRD','dprdprovController@view')->name('view_dprdprov');
Route::get('chartt', 'dprdprovController@chartt')->name('chartt');
Route::get('tampil','dprdprovController@tampil')->name('tampil');
Route::get('changee', 'dprdprovController@changee')->name('changee');

//All DPRD
Route::get('view-data', 'allController@tampil_data')->name('tampil_data');
Route::get('chart', 'allController@chart')->name('chart');
Route::get('tampil','allController@tampil')->name('tampil');
Route::get('change', 'allController@change')->name('change');
Route::get('change-kk', 'allController@change_kk')->name('change_kk');
Route::get('chart-prov', 'allController@chart_p')->name('chart_p');
Route::get('tampil-prov','allController@tampil_c')->name('tampil_c');