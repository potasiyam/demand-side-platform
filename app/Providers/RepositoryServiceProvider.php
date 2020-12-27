<?php

namespace App\Providers;

use App\Repository\Campaign\CampaignRepository;
use App\Repository\Campaign\CampaignRepositoryInterface;
use App\Repository\CampaignCreative\CampaignCreativeRepository;
use App\Repository\CampaignCreative\CampaignCreativeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(CampaignRepositoryInterface::class, CampaignRepository::class);
        $this->app->bind(CampaignCreativeRepositoryInterface::class, CampaignCreativeRepository::class);
    }
}
