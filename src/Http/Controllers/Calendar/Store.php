<?php

namespace LaravelLiberu\Calendar\Http\Controllers\Calendar;

use Illuminate\Routing\Controller;
use LaravelLiberu\Calendar\Http\Requests\ValidateCalendar;
use LaravelLiberu\Calendar\Http\Resources\Calendar as Resource;
use LaravelLiberu\Calendar\Models\Calendar;

class Store extends Controller
{
    public function __invoke(ValidateCalendar $request, Calendar $calendar)
    {
        $calendar->fill($request->validated())->save();

        return [
            'message' => __('The calendar was created!'),
            'calendar' => new Resource($calendar),
        ];
    }
}
