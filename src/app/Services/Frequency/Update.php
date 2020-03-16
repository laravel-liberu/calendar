<?php

namespace LaravelEnso\Calendar\App\Services\Frequency;

use LaravelEnso\Calendar\App\Enums\UpdateType;
use LaravelEnso\Calendar\App\Models\Event;
use LaravelEnso\Calendar\App\Services\Sequence;

class Update
{
    protected Event $event;
    protected $updateType;

    public function __construct(Event $event, int $updateType)
    {
        $this->event = $event;
        $this->updateType = $updateType;
    }

    public function handle()
    {
        if ($this->isSingular()) {
            $this->extract();
        } else {
            $this->sync();
        }
    }

    private function extract()
    {
        (new Sequence($this->event))->extract();

        $this->event->save();
    }

    private function sync()
    {
        if ($this->shouldRegenerate()) {
            $this->regenerate();
        } else {
            $this->update();
        }
    }

    private function regenerate()
    {
        Event::sequence($this->event->parent_id ?? $this->event->id)
            ->where('start_date', '>', $this->event->getOriginal('start_date'))
            ->delete();

        $this->event->parent_id = null;
        $this->event->store();
    }

    private function update()
    {
        $dirty = $this->event->getDirty();
        unset($dirty['parent_id']);

        if ($this->updateType === UpdateType::ThisAndFuture) {
            $this->currentAndFuture($dirty);
        } else {
            $this->all($dirty);
        }
    }

    private function currentAndFuture(array $dirty)
    {
        if ($this->event->parent_id) {
            (new Sequence($this->event))->break();
        }

        $this->event->events()->update($dirty);
    }

    private function all(array $dirty)
    {
        Event::sequence($this->event->parent_id ?? $this->event->id)
            ->update($dirty);
    }

    private function shouldRegenerate(): bool
    {
        return $this->event->isDirty(['frequence', ...$this->event->getDates()]);
    }

    private function isSingular(): bool
    {
        return $this->updateType === UpdateType::OnlyThis;
    }
}
