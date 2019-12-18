# Stisla

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require anamcoollzz/stisla
```

## Usage

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

# Step by step
- Setup your database configuration first in ```.env```
- Remove all default migrations in database/migrations folder
- Publish all stisla component with below
``` bash 
$ php artisan vendor:publish --tag=stisla.all 
```
- run dump with
``` bash 
$ composer dump-autoload 
```
- run 
``` bash 
$ php artisan migrate --seed 
```

## Add to your register method in AppServiceProvider

``` php
\Route::resourceVerbs([
    'create'    => 'tambah',
    'edit'      => 'ubah',
]);
\Blade::include('stisla.components.input', 'input');
\Blade::include('stisla.components.inputemail', 'email');
\Blade::include('stisla.components.inputnumber', 'inputnumber');
\Blade::include('stisla.components.inputimage', 'inputimage');
\Blade::include('stisla.components.inputexcel', 'inputexcel');
\Blade::include('stisla.components.textarea', 'textarea');
\Blade::include('stisla.components.select', 'select');
\Blade::include('stisla.components.datepicker', 'datepicker');
```

## Add to your web.php in routes folder

``` php
Route::get('/masuk', 'Stisla\AutentikasiController@formMasuk')->name('masuk');
Route::post('/masuk', 'Stisla\AutentikasiController@masuk');

Route::middleware('auth')->group(function(){

	Route::get('/', 'Stisla\AutentikasiController@dashboard')->name('dashboard');
	Route::get('/profil', 'Stisla\AutentikasiController@profil')->name('profil');
	Route::put('/profil', 'Stisla\AutentikasiController@perbaruiProfil')->name('profil.update');
	Route::get('/keluar', 'Stisla\AutentikasiController@keluar')->name('keluar');

});
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email hairulanam21@gmail.com instead of using the issue tracker.

## Credits

- [Hairul Anam][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/anamcoollzz/stisla.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/anamcoollzz/stisla.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/anamcoollzz/stisla/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/anamcoollzz/stisla
[link-downloads]: https://packagist.org/packages/anamcoollzz/stisla
[link-travis]: https://travis-ci.org/anamcoollzz/stisla
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/anamcoollzz
[link-contributors]: ../../contributors
