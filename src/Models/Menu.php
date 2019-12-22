<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
    	'ikon', 'route', 'parent_id', 'nama', 'is_blank',
    ];
    
    public $timestamps = false;

    public function sub()
    {
        return $this->hasMany('App\Menu', 'parent_id');
    }
}
