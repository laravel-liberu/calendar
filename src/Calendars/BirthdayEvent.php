<?php

namespace LaravelLiberu\Calendar\Calendars;

use Carbon\Carbon;
use LaravelLiberu\Calendar\Contracts\Calendar;
use LaravelLiberu\Calendar\Contracts\ProvidesEvent;
use LaravelLiberu\Calendar\Enums\Frequencies;
use LaravelLiberu\People\Models\Person;

class BirthdayEvent implements ProvidesEvent
{
    private Person $person;
    private $year;

    public function __construct(Person $person, $year)
    {
        $this->person = $person;
        $this->year = $year;
    }

    public function getKey()
    {
        return $this->person->getKey();
    }

    public function title(): string
    {
        return __(':name`s birthday', ['name' => $this->person->name]);
    }

    public function body(): ?string
    {
        return null;
    }

    public function start(): Carbon
    {
        return $this->person->birthday->setYear($this->year)->startOfDay();
    }

    public function end(): Carbon
    {
        return $this->person->birthday->setYear($this->year)->endOfDay();
    }

    public function location(): ?string
    {
        return null;
    }

    public function getCalendar(): Calendar
    {
        return new BirthdayCalendar();
    }

    public function frequency(): int
    {
        return Frequencies::Yearly;
    }

    public function recurrenceEnds(): ?Carbon
    {
        return null;
    }

    public function allDay(): bool
    {
        return true;
    }

    public function readonly(): bool
    {
        return true;
    }
}
