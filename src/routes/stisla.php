<?php 

Route::get('/masuk', 'Stisla\AutentikasiController@formMasuk')->name('masuk');
Route::post('/masuk', 'Stisla\AutentikasiController@masuk');