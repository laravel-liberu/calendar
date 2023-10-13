<?php

namespace LaravelLiberu\Calendar\Http\Controllers\Events;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Calendar\Http\Requests\ValidateEventDestroy;
use LaravelLiberu\Calendar\Models\Event;

class Destroy extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateEventDestroy $request, Event $event)
    {
        $this->authorize('handle', $event);

        $event->remove($request->get('updateType'));

        return ['message' => __('The event was successfully deleted')];
    }
}
