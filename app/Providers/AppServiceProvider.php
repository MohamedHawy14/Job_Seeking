<?php

namespace App\Providers;

use App\Contracts\AuthServiceInterface;
use App\Contracts\ListingServiceInterface;
use App\Models\Listing;
use App\Observers\ListingObserver;
use App\Services\AuthService;
use App\Services\ListingService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ListingServiceInterface::class, ListingService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Listing::observe(new ListingObserver);
    }
}
