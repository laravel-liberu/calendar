<?php

namespace LaravelLiberu\Calendar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelLiberu\Calendar\Enums\Colors;

class ValidateCalendar extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'color' => 'required|in:'.Colors::keys()->implode(','),
            'private' => 'required|boolean',
        ];
    }
}
