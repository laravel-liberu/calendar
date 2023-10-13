<?php

namespace LaravelLiberu\Calendar\Services\Frequency;

use LaravelLiberu\Calendar\Enums\UpdateType;
use LaravelLiberu\Calendar\Models\Event;
use LaravelLiberu\Calendar\Services\Sequence;

class Delete
{
    public function __construct(
        protected Event $event,
        protected int $updateType
    ) {
    }

    public function handle()
    {
        match ($this->updateType) {
            UpdateType::All => $this->all(),
            UpdateType::ThisAndFuture => $this->currentAndFuture(),
            UpdateType::OnlyThis => $this->current(),
        };
    }

    private function all()
    {
        Event::sequence($this->event->parent_id ?? $this->event->id)->delete();
    }

    private function currentAndFuture()
    {
        (new Sequence($this->event))->break();

        Event::sequence($this->event->parent_id ?? $this->event->id)
            ->where('start_date', '>=', $this->event->start_date->format('Y-m-d'))
            ->delete();
    }

    private function current()
    {
        (new Sequence($this->event))->extract();

        $this->event->delete();
    }
}
