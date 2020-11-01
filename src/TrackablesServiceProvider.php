<?php

namespace EdgarMendozaTech\Trackables;

use Illuminate\Support\ServiceProvider;

class TrackablesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
