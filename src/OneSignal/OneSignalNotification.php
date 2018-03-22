<?php

namespace Thekaduu\OneSignal;

use App\Models\User;

class OneSignalNotification
{
    private $message;
    private $options;

    public function __construct(string $message,  array $options = [], string $locale = "en")
    {
        $this->message                = [$locale => $message];
        $options['included_segments'] = ['All'];
        $this->options = $options;

    }

    public function addOption(string $key, $value) : OneSignalNotification
    {
        $this->options[$key] = $value;
        return $this;
    }

    public function toArray() : array
    {
        $content = array("en" => 'Teste Novo IC');
        $array = $this->options;
        $array['app_id']  = config('oneSignal.appKey');
        $array['contents']  = $this->message;
        return $array;
    }
}
