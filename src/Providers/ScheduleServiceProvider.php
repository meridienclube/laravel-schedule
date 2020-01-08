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
        $this->loadViewsFrom(__DIR__ . '/../Views', 'vendor');
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
