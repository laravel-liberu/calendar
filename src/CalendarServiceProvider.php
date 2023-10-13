<?php

namespace LaravelLiberu\Calendar;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\Calendar\Facades\Calendars;

class CalendarServiceProvider extends ServiceProvider
{
    protected $register = [];

    public function boot()
    {
        Calendars::register($this->register);
    }
}
