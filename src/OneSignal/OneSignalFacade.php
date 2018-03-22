<?php

namespace Thekaduu\OneSignal;

use Illuminate\Support\Facades\Facade;
use Thekaduu\OneSignal\OneSignalService as OneSignal;

class OneSignalFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return OneSignal::class;
    }
}
