<?php

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['web', 'auth'])
    ->namespace('ConfrariaWeb\Schedule\Controllers')
    ->group(function () {

        Route::resource('schedules', 'ScheduleController');

    });
