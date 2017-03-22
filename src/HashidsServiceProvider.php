<?php

namespace Amamarul\Hashids;

use Amamarul\Hashids\Support\Hashids\Hashids;
use Amamarul\Hashids\Support\HashidsManager;
use Amamarul\Hashids\Support\HashidsFactory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class HashidsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
        require_once(__DIR__.'/helpers/helpers.php');
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/config/hashids.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('hashids.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('hashids');
        }

        $this->publishes([
            $source => config_path('hashids.php'),
        ], 'config');
        $this->mergeConfigFrom($source, 'hashids');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Hashids', \Amamarul\Hashids\Support\Facades\Hashids::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
