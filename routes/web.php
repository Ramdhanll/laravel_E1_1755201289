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

Route::get('/', function () {
    return view('welcome');
});

Route::get('mhs', 'MahasiswaController@index');
Route::get('mhs/create', 'MahasiswaController@create')->name('mhs.create');
Route::post('mhs', 'MahasiswaController@store')->name('mhs.store');
Route::get('list_mhs', 'MahasiswaController@list_mhs')->name('datatablesmhs');
Route::get('mhs/edit/{nim}', 'MahasiswaController@edit')->name('mhs.edit');
Route::put('mhs/update/{id}', 'MahasiswaController@update')->name('mhs.update');
Route::get('mhs/delete/{id}', 'MahasiswaController@destroy')->name('mhs.destroy');

Route::get('prodi', 'ProdiController@index');
Route::get('prodi/create', 'ProdiController@create')->name('prodi.create');
Route::post('prodi', 'ProdiController@store')->name('prodi.store');
Route::get('prodi/edit/{kode_prodi}', 'ProdiController@edit')->name('prodi.edit');
Route::put('prodi/update/{id}', 'ProdiController@update')->name('prodi.update');
Route::get('prodi/delete/{id}', 'ProdiController@destroy')->name('prodi.destroy');
Route::get('list_prodi', 'ProdiController@list_prodi')->name('datatablesprodi');

Route::get('mata-kuliah', 'MatkulController@index');
Route::get('mata-kuliah/create', 'MatkulController@create')->name('mata-kuliah.create');
Route::post('mata-kuliah', 'MatkulController@store')->name('mata-kuliah.store');
Route::get('mata-kuliah/edit/{kode_matkul}', 'MatkulController@edit')->name('mata-kuliah.edit');
Route::put('mata-kuliah/update/{id}', 'MatkulController@update')->name('mata-kuliah.update');
Route::get('mata-kuliah/delete/{kode_matkul}', 'MatkulController@destroy')->name('mata-kuliah.destroy');
Route::get('list_matkul', 'MatkulController@list_matkul')->name('datatablesmatkul');

