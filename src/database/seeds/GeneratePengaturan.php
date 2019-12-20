<?php

use Illuminate\Database\Seeder;
use App\Pengaturan;

class GeneratePengaturan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengaturan::updateOrCreate([
        	'key'		=> 'nama_aplikasi',
        ], [
        	'value'		=> 'Nama Aplikasi',
        ]);
        Pengaturan::updateOrCreate([
            'key'       => 'nama_aplikasi_mobile',
        ], [
            'value'     => 'NA',
        ]);
        Pengaturan::updateOrCreate([
            'key'       => 'tahun',
        ], [
            'value'     => '2019',
        ]);
        Pengaturan::updateOrCreate([
            'key'       => 'versi',
        ], [
            'value'     => '1.0.0',
        ]);
        Pengaturan::updateOrCreate([
            'key'       => 'nama_perusahaan',
        ], [
            'value'     => 'Nama Perusahaan',
        ]);
        Pengaturan::updateOrCreate([
            'key'       => 'logo',
        ], [
            'value'     => url('stisla/assets/img/stisla-fill.svg'),
        ]);
    }
}
