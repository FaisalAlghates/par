<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(\Nwidart\Modules\LaravelModulesServiceProvider::class);
        
        // Register module service providers manually
        $this->app->register(\Modules\LandingPage\Providers\LandingPageServiceProvider::class);
        $this->app->register(\Modules\Documentation\Providers\DocumentationServiceProvider::class);
        $this->app->register(\Modules\Presentation\Providers\PresentationServiceProvider::class);
        $this->app->register(\Modules\Admin\Providers\AdminServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
