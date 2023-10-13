<?php

namespace LaravelLiberu\Calendar;

use LaravelLiberu\Calendar\Enums\Frequencies;
use LaravelLiberu\Calendar\Enums\UpdateType;
use LaravelLiberu\Enums\EnumServiceProvider as ServiceProvider;

class EnumServiceProvider extends ServiceProvider
{
    public $register = [
        'eventUpdateType' => UpdateType::class,
        'eventFrequencies' => Frequencies::class,
    ];
}
