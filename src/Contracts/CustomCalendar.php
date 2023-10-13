<?php

namespace LaravelLiberu\Calendar\Contracts;

use Carbon\Carbon;
use Illuminate\Support\Collection;

interface CustomCalendar extends Calendar
{
    public function events(Carbon $startDate, Carbon $endDate): Collection;
}
