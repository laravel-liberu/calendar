<?php

namespace LaravelLiberu\Calendar\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaravelLiberu\Calendar\Models\Event;
use LaravelLiberu\Calendar\Models\Reminder;

class ReminderFactory extends Factory
{
    protected $model = Reminder::class;

    public function definition()
    {
        return [
            'event_id' => fn () => Event::factory()->create()->id,
            'scheduled_at' => $this->faker->dateTime,
        ];
    }
}
