<?php

namespace App\Providers;

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Illuminate\Support\ServiceProvider;

class LaraCakeOrmProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Configure::write('App.namespace', 'App');
        Cache::setConfig(config('laracakeorm.Cache'));

        ConnectionManager::setConfig(config('laracakeorm.Datasources'));
    }
}
