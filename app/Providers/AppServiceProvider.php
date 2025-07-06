<?php

namespace App\Providers;

use App\Repositories\AboutBannerRepository;
use App\Repositories\AuthRepository;
use App\Repositories\ContactBannerRepository;
use App\Repositories\GalleryBannerRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\Interface\AboutBannerRepositoryInterface;
use App\Repositories\Interface\AuthRepositoryInterface;
use App\Repositories\Interface\ContactBannerRepositoryInterface;
use App\Repositories\Interface\GalleryBannerRepositoryInterface;
use App\Repositories\Interface\GalleryRepositoryInterface;
use App\Repositories\Interface\MilestoneBannerRepositoryInterface;
use App\Repositories\Interface\MilestoneRepositoryInterface;
use App\Repositories\Interface\NewsBannerRepositoryInterface;
use App\Repositories\Interface\NewsRepositoryInterface;
use App\Repositories\Interface\PrivacyPolicyInterface;
use App\Repositories\Interface\SportRepositoryInterface;
use App\Repositories\Interface\UniversityCoverageRepositoryInterface;
use App\Repositories\Interface\WebContactRepositoryInterface;
use App\Repositories\Interface\WebProfileRepositoryInterface;
use App\Repositories\MilestoneBannerRepository;
use App\Repositories\MilestoneRepository;
use App\Repositories\NewsBannerRepository;
use App\Repositories\NewsRepository;
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
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
        $this->app->bind(AboutBannerRepositoryInterface::class, AboutBannerRepository::class);
        $this->app->bind(ContactBannerRepositoryInterface::class, ContactBannerRepository::class);
        $this->app->bind(MilestoneBannerRepositoryInterface::class, MilestoneBannerRepository::class);
        $this->app->bind(GalleryBannerRepositoryInterface::class, GalleryBannerRepository::class);
        $this->app->bind(NewsBannerRepositoryInterface::class, NewsBannerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
