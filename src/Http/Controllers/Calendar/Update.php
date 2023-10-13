<?php

namespace LaravelLiberu\Calendar\Http\Controllers\Calendar;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Calendar\Http\Requests\ValidateCalendar;
use LaravelLiberu\Calendar\Http\Resources\Calendar as Resource;
use LaravelLiberu\Calendar\Models\Calendar;

class Update extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateCalendar $request, Calendar $calendar)
    {
        $this->authorize('handle', $calendar);

        $calendar->update($request->validated());

        return [
            'message' => __('The calendar was updated!'),
            'calendar' => new Resource($calendar),
        ];
    }
}
