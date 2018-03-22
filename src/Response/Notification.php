<?php

namespace Services\OneSignal\Response;

use Illuminate\Support\Collection;

class Notification extends AbstractNotification
{
    public function __construct(array $parameters)
    {
        foreach ($parameters as $attribute => $value) {
            $kebabAttribute = lcfirst(studly_case($attribute));
            $this->$kebabAttribute = $value;
        }
    }

    public function __get($attribute)
    {
        if (property_exists(Notification::class, $attribute)) {
            return $this->$attribute;
        }
        return null;
    }
}
