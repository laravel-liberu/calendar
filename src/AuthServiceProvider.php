<?php

namespace LaravelLiberu\Calendar;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use LaravelLiberu\Calendar\Contracts\Calendar;
use LaravelLiberu\Calendar\Models\Event;
use LaravelLiberu\Calendar\Policies\CalendarPolicy;
use LaravelLiberu\Calendar\Policies\EventPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Event::class => EventPolicy::class,
        Calendar::class => CalendarPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
