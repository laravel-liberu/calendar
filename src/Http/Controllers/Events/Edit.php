<?php

namespace LaravelLiberu\Calendar\Http\Controllers\Events;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Calendar\Forms\Builders\Event as Form;
use LaravelLiberu\Calendar\Models\Event;

class Edit extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Event $event, Form $form)
    {
        $this->authorize('handle', $event);

        return ['form' => $form->edit($event)];
    }
}
