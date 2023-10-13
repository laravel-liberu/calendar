<?php

namespace LaravelLiberu\Calendar;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\Calendar\Dynamics\Relations\CalendarEvents;
use LaravelLiberu\Calendar\Dynamics\Relations\Calendars;
use LaravelLiberu\DynamicMethods\Services\Methods;
use LaravelLiberu\Users\Models\User;

class UserServiceProvider extends ServiceProvider
{
    private array $methods = [
        CalendarEvents::class,
        Calendars::class,
    ];

    public function boot()
    {
        Methods::bind(User::class, $this->methods);
    }
}
