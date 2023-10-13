<?php

namespace LaravelLiberu\Calendar\Services\Frequency\Repeats;

use Illuminate\Support\Collection;

class Once extends Repeat
{
    public function dates(): Collection
    {
        return new Collection();
    }
}
