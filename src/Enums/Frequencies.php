<?php

namespace LaravelLiberu\Calendar\Enums;

use LaravelLiberu\Enums\Services\Enum;

class Frequencies extends Enum
{
    public const Once = 1;
    public const Daily = 2;
    public const Weekdays = 3;
    public const Weekly = 4;
    public const Monthly = 5;
    public const Yearly = 6;
}
