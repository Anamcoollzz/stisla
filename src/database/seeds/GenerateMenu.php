<?php

use Illuminate\Database\Seeder;
use App\Menu;

class GenerateMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$i = 1;
        Menu::updateOrCreate([
        	'id'		=> $i++,
        ], [
        	'nama'		=> 'Dashboard',
        	'ikon'		=> 'fas fa-fire',
        	'route'		=> 'dashboard',
        ]);
        Menu::updateOrCreate([
        	'id'		=> $i++,
        ], [
        	'nama'		=> 'Keluar',
        	'ikon'		=> 'fas fa-sign-out-alt',
        	'route'		=> 'keluar',
        ]);
    }
}
