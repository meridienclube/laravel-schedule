<?php

namespace ConfrariaWeb\Schedule\Providers;

use ConfrariaWeb\Schedule\Contracts\ScheduleContract;
use ConfrariaWeb\Schedule\Contracts\ScheduleFrequencyOptionContract;
use ConfrariaWeb\Schedule\Repositories\ScheduleFrequencyOptionRepository;
use ConfrariaWeb\Schedule\Repositories\ScheduleRepository;
use ConfrariaWeb\Schedule\Services\ScheduleFrequencyOptionService;
use ConfrariaWeb\Schedule\Services\ScheduleService;
use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Databases/Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../Translations', 'schedule');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'schedule');
        $this->publishes([__DIR__ . '/../../config/cw_schedule.php' => config_path('cw_schedule.php')], 'cw_schedule');

    }

    public function register()
    {

        $this->app->bind(ScheduleContract::class, ScheduleRepository::class);
        $this->app->bind('ScheduleService', function ($app) {
            return new ScheduleService($app->make(ScheduleContract::class));
        });

        $this->app->bind(ScheduleFrequencyOptionContract::class, ScheduleFrequencyOptionRepository::class);
        $this->app->bind('ScheduleFrequencyOptionService', function ($app) {
            return new ScheduleFrequencyOptionService($app->make(ScheduleFrequencyOptionContract::class));
        });

    }

}
