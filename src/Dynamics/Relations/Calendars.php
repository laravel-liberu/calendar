<?php

namespace LaravelLiberu\Calendar\Dynamics\Relations;

use Closure;
use LaravelLiberu\Calendar\Models\Calendar;
use LaravelLiberu\DynamicMethods\Contracts\Method;

class Calendars implements Method
{
    public function name(): string
    {
        return 'calendars';
    }

    public function closure(): Closure
    {
        return fn () => $this
            ->hasMany(Calendar::class, 'created_by');
    }
}
