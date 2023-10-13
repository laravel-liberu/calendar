<?php

namespace LaravelLiberu\Calendar\Http\Controllers\Calendar;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Calendar\Forms\Builders\Calendar as Form;
use LaravelLiberu\Calendar\Models\Calendar;

class Edit extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Calendar $calendar, Form $form)
    {
        $this->authorize('handle', $calendar);

        return ['form' => $form->edit($calendar)];
    }
}
