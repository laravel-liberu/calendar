<?php

namespace LaravelLiberu\Calendar\Dynamics\Relations;

use Closure;
use LaravelLiberu\Calendar\Models\Event;
use LaravelLiberu\DynamicMethods\Contracts\Method;

class CalendarEvents implements Method
{
    public function name(): string
    {
        return 'calendarEvents';
    }

    public function closure(): Closure
    {
        return fn () => $this
            ->belongsToMany(Event::class, 'calendar_event_user');
    }
}
