<?php

namespace EscolaLms\Dictionaries;

use EscolaLms\Auth\EscolaLmsAuthServiceProvider;
use EscolaLms\Dictionaries\Providers\AuthServiceProvider;
use Illuminate\Support\ServiceProvider;

/**
 * SWAGGER_VERSION
 */
class EscolaLmsDictionariesServiceProvider extends ServiceProvider
{
    public const SERVICES = [
    ];

    public const REPOSITORIES = [
    ];

    public $singletons = self::SERVICES + self::REPOSITORIES;

    public function register(): void
    {
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(EscolaLmsAuthServiceProvider::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    public function bootForConsole(): void
    {
    }
}
