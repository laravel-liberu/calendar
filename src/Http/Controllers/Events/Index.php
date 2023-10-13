<?php

namespace LaravelLiberu\Calendar\Http\Controllers\Events;

use Illuminate\Routing\Controller;
use LaravelLiberu\Calendar\Http\Requests\ValidateEventIndex;
use LaravelLiberu\Calendar\Http\Responses\Events;

class Index extends Controller
{
    public function __invoke(ValidateEventIndex $request)
    {
        return new Events();
    }
}
