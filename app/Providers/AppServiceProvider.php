<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\WebProfileRepository;
use App\Repositories\WebContactRepository;
use App\Repositories\Interface\WebContactRepositoryInterface;
use App\Repositories\Interface\WebProfileRepositoryInterface;
use App\Repositories\Interface\AuthRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(WebProfileRepositoryInterface::class, WebProfileRepository::class);
        $this->app->bind(WebContactRepositoryInterface::class, WebContactRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
