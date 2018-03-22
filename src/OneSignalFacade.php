<?php

namespace Services\OneSignal;

use Illuminate\Support\Facades\Facade;
use Services\OneSignal\OneSignalService as OneSignal;

class OneSignalFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return OneSignal::class;
    }
}
