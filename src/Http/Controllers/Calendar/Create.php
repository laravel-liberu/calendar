<?php

namespace LaravelLiberu\Calendar\Http\Controllers\Calendar;

use Illuminate\Routing\Controller;
use LaravelLiberu\Calendar\Forms\Builders\Calendar;

class Create extends Controller
{
    public function __invoke(Calendar $form)
    {
        return ['form' => $form->create()];
    }
}
