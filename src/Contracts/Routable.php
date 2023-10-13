<?php

namespace LaravelLiberu\Calendar\Contracts;

use LaravelLiberu\Calendar\DTOs\Route;

interface Routable
{
    public function route(): Route;
}
