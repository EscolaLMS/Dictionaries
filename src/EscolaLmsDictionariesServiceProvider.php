<?php

namespace EscolaLms\Dictionaries;

use EscolaLms\Auth\EscolaLmsAuthServiceProvider;
use EscolaLms\Dictionaries\Providers\AuthServiceProvider;
use EscolaLms\Dictionaries\Repositories\Contracts\DictionaryRepositoryContract;
use EscolaLms\Dictionaries\Repositories\DictionaryRepository;
use EscolaLms\Dictionaries\Services\Contracts\DictionaryServiceContract;
use EscolaLms\Dictionaries\Services\DictionaryService;
use Illuminate\Support\ServiceProvider;

/**
 * SWAGGER_VERSION
 */
class EscolaLmsDictionariesServiceProvider extends ServiceProvider
{
    public const SERVICES = [
        DictionaryServiceContract::class => DictionaryService::class,
    ];

    public const REPOSITORIES = [
        DictionaryRepositoryContract::class => DictionaryRepository::class,
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
