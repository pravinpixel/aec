<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;


class GlobalService extends Facade
{

    public static function resolveFacede()
    {
        return app()['GlobalService'];
    }

    public static function __callStatic($method, $arguments)
    {
        return (self::resolveFacede())->$method(...$arguments);
    }

} 