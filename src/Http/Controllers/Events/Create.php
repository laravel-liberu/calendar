<?php

namespace LaravelLiberu\Calendar\Http\Controllers\Events;

use Illuminate\Routing\Controller;
use LaravelLiberu\Calendar\Forms\Builders\Event;

class Create extends Controller
{
    public function __invoke(Event $form)
    {
        return ['form' => $form->create()];
    }
}
