<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\Interface\AuthRepositoryInterface;
use App\Repositories\Interface\GalleryRepositoryInterface;
use App\Repositories\Interface\MilestoneRepositoryInterface;
use App\Repositories\Interface\PrivacyPolicyInterface;
use App\Repositories\Interface\SportRepositoryInterface;
use App\Repositories\Interface\UniversityCoverageRepositoryInterface;
use App\Repositories\Interface\WebContactRepositoryInterface;
use App\Repositories\Interface\WebProfileRepositoryInterface;
use App\Repositories\MilestoneRepository;
use App\Repositories\PrivacyPolicyRepository;
use App\Repositories\SportRepository;
use App\Repositories\UniversityCoverageRepository;
use App\Repositories\WebContactRepository;
use App\Repositories\WebProfileRepository;
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
        $this->app->bind(SportRepositoryInterface::class, SportRepository::class);
        $this->app->bind(GalleryRepositoryInterface::class, GalleryRepository::class);
        $this->app->bind(UniversityCoverageRepositoryInterface::class, UniversityCoverageRepository::class);
        $this->app->bind(MilestoneRepositoryInterface::class, MilestoneRepository::class);
        $this->app->bind(PrivacyPolicyInterface::class, PrivacyPolicyRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
