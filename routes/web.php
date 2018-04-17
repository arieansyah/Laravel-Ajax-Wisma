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



Route::group(['middleware' => ['auth']], function(){
  Route::get('/', function () {
    return view('index');
  });

  $this->get('logout', 'Auth\LoginController@logout');

  Route::get('buku_tamu/data', 'BukuTamuController@listData')->name('buku_tamu.data');
  Route::resource('buku_tamu', 'BukuTamuController');

  Route::get('wisma/{id}/tambah', 'WismaController@addOrang');
  Route::post('wisma/store', 'WismaController@saveOrang')->name('wisma.store');
  Route::delete('wisma/{id}/{idd}/delete', 'WismaController@destroy')->name('wisma.delete');
  Route::get('wisma/{id}/edit', 'WismaController@edit');
  Route::patch('wisma/{id}/update', 'WismaController@update');
  Route::get('wisma/{id}/data', 'WismaController@listDataNik')->name('wisma.data');
  Route::patch('wisma/{id}/reset', 'WismaController@reset');

  Route::get('wisma1', 'WismaController@wisma1');
  Route::get('wisma1/data', 'WismaController@listDataWisma1')->name('wisma1.data');

  Route::get('wisma2', 'WismaController@wisma2');
  Route::get('wisma2/data', 'WismaController@listDataWisma2')->name('wisma2.data');

  Route::get('wisma3', 'WismaController@wisma3');
  Route::get('wisma3/data', 'WismaController@listDataWisma3')->name('wisma3.data');

  Route::get('wisma4', 'WismaController@wisma4');
  Route::get('wisma4/data', 'WismaController@listDataWisma4')->name('wisma4.data');

  Route::get('laporan', 'LaporanController@index');
  Route::post('laporan', 'LaporanController@refresh')->name('laporan.refresh');
  Route::get('laporan/data/{awal}/{akhir}', 'LaporanController@listData')->name('laporan.data');
  Route::get('laporan/pdf/{awal}/{akhir}', 'LaporanController@exportPDF');


  Route::get('/home', 'HomeController@index')->name('home');
});
Auth::routes();
