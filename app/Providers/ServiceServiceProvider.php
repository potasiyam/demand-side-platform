<?php

namespace App\Providers;

use App\Service\Campaign\CampaignService;
use App\Service\Campaign\CampaignServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CampaignServiceInterface::class, CampaignService::class);
    }
}
