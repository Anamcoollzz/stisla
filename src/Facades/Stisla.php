<?php

namespace Anamcoollzz\Stisla\Facades;

use Illuminate\Support\Facades\Facade;

class Stisla extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'stisla';
    }
}
