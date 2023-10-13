<?php

namespace LaravelLiberu\Calendar\Http\Responses;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use LaravelLiberu\Calendar\Contracts\CustomCalendar;
use LaravelLiberu\Calendar\Facades\Calendars;
use LaravelLiberu\Calendar\Http\Resources\Event as Resource;
use LaravelLiberu\Calendar\Models\Calendar;
use LaravelLiberu\Calendar\Models\Event;

class Events implements Responsable
{
    private Request $request;
    private Collection $calendars;

    public function toResponse($request)
    {
        $this->request = $this->request($request);

        $this->calendars = $this->calendars();

        return Resource::collection(
            $this->native()->concat($this->custom())
        );
    }

    private function native()
    {
        $nativeCalendars = $this->calendars
            ->filter(fn ($calendar) => $this->isNative($calendar));

        return Event::with('parent')->for($nativeCalendars)->between(
            $this->request->get('startDate'),
            $this->request->get('endDate')
        )->get();
    }

    private function custom()
    {
        return $this->calendars
            ->reject(fn ($calendar) => $this->isNative($calendar))
            ->reduce(fn ($events, CustomCalendar $calendar) => $events->concat(
                $calendar->events(
                    $this->request->get('startDate'),
                    $this->request->get('endDate')
                )
            ), new Collection());
    }

    private function isNative($calendar)
    {
        return $calendar instanceof Calendar;
    }

    private function calendars()
    {
        return Calendars::only($this->request->get('calendars'));
    }

    private function request($request)
    {
        $request->replace([
            'startDate' => $request->get('startDate')
                ? Carbon::parse($request->get('startDate'))
                : null,
            'endDate' => $request->get('endDate')
                ? Carbon::parse($request->get('endDate'))
                : null,
            'calendars' => $request->get('calendars', []),
        ]);

        return $request;
    }
}
