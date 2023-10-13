<?php

namespace LaravelLiberu\Calendar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelLiberu\Calendar\Facades\Calendars;

class ValidateEventIndex extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'startDate' => 'nullable|date',
            'endDate' => 'nullable|date',
            'calendars' => 'array|in:'.Calendars::keys()->implode(','),
        ];
    }
}
