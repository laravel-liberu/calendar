<?php

namespace LaravelLiberu\Calendar\Services\Frequency\Repeats;

use Illuminate\Support\Collection;

class Daily extends Repeat
{
    public function dates(): Collection
    {
        return $this->interval();
    }
}
