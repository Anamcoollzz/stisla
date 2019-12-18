<?php 

Route::get('/masuk', 'AutentikasiController@formMasuk')->name('masuk');
Route::post('/masuk', 'AutentikasiController@masuk');