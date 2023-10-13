<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use LaravelLiberu\Calendar\Calendars\BirthdayCalendar;
use LaravelLiberu\Calendar\Enums\Colors;
use LaravelLiberu\Calendar\Models\Calendar;
use LaravelLiberu\People\Models\Person;
use LaravelLiberu\Users\Models\User;
use Tests\TestCase;

class CalendarTest extends TestCase
{
    use RefreshDatabase;

    protected Calendar $calendar;
    protected Carbon $date;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->calendar = Calendar::factory()->create();
    }

    /** @test */
    public function create_calendar()
    {
        $result = $this->post(route('core.calendar.store'), [
            'name' => 'test',
            'color' => Colors::Red,
            'private' => false,
        ]);

        $this->assertTrue(Calendar::whereName('test')->exists());
    }

    /** @test */
    public function can_limit_birthday_calendar_roles()
    {
        Config::set('enso.calendar.birthdays.roles', []);

        $this->assertEmpty((new BirthdayCalendar())
            ->events(Person::first()->birthday, Person::first()->birthday->addDay()));
    }
}
