<?php

namespace LaravelLiberu\Calendar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelLiberu\Calendar\Enums\Frequencies;
use LaravelLiberu\Calendar\Enums\UpdateType;

class ValidateEventDestroy extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }

    public function withValidator($validator)
    {
        $validator->sometimes(
            'updateType',
            'required|in:'.UpdateType::keys()->implode(','),
            fn () => $this->route('event')->frequency !== Frequencies::Once
        );
    }
}
