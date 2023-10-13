<?php

namespace LaravelLiberu\Calendar\Http\Controllers\Calendar;

use Illuminate\Routing\Controller;
use LaravelLiberu\Calendar\Facades\Calendars;
use LaravelLiberu\Calendar\Http\Resources\Calendar;

class Index extends Controller
{
    public function __invoke()
    {
        return Calendar::collection(Calendars::all());
    }
}
