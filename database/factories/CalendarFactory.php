<?php

namespace LaravelLiberu\Calendar\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaravelLiberu\Calendar\Enums\Colors;
use LaravelLiberu\Calendar\Models\Calendar;

class CalendarFactory extends Factory
{
    protected $model = Calendar::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text,
            'color' => Colors::values()->random(),
            'private' => false,
        ];
    }
}
