<?php

namespace Woenel\Laravesta\Facades;

use Illuminate\Support\Facades\Facade;

class Laravesta extends Facade 
{
    protected static function getFacadeAccessor()
    {
        return 'Laravesta';
    }
}