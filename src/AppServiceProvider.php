<?php

namespace LaravelLiberu\Calendar;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
use LaravelLiberu\Calendar\Commands\SendReminders;
use LaravelLiberu\Calendar\Services\Calendars;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        'calendars' => Calendars::class,
    ];

    public function boot()
    {
        $this->load()
            ->publishProvider()
            ->publishFactories()
            ->publishMail()
            ->publishConfig()
            ->command();
    }

    private function load()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->mergeConfigFrom(__DIR__.'/../config/calendar.php', 'liberu.calendar');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-liberu/calendar');

        return $this;
    }

    private function publishProvider()
    {
        $this->publishes([
            __DIR__.'/../stubs/CalendarServiceProvider.stub' => app_path(
                'Providers/CalendarServiceProvider.php'
            ),
        ], 'calendar-provider');

        return $this;
    }

    private function publishFactories()
    {
        $this->publishes([
            __DIR__.'/../database/factories' => database_path('factories'),
        ], 'calendar-factories');

        $this->publishes([
            __DIR__.'/../database/factories' => database_path('factories'),
        ], 'liberu-factories');

        return $this;
    }

    private function publishMail()
    {
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-liberu/calendar'),
        ], 'calendar-mail');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-liberu/calendar'),
        ], 'liberu-mail');

        return $this;
    }

    private function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../config' => config_path('liberu'),
        ], ['liberu-config', 'calendar-config']);

        return $this;
    }

    public function command(): void
    {
        $this->commands(SendReminders::class);

        $this->app->booted(fn () => $this->app->make(Schedule::class)
            ->command('liberu:calendar:send-reminders')->everyMinute());
    }
}
