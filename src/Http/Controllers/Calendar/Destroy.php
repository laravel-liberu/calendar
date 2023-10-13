<?php

namespace LaravelLiberu\Calendar\Http\Controllers\Calendar;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Calendar\Models\Calendar;

class Destroy extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Calendar $calendar)
    {
        $this->authorize('handle', $calendar);

        $calendar->delete();

        return ['message' => __('The calendar was successfully deleted')];
    }
}
