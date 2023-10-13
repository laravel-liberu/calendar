<?php

namespace LaravelLiberu\Calendar\Http\Controllers\Calendar;

use Illuminate\Routing\Controller;
use LaravelLiberu\Calendar\Models\Calendar;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Calendar::class;
}
