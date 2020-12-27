<?php

namespace App\Service\Campaign;

use App\Contracts\ServiceDto;

interface CampaignServiceInterface
{
    public function getCampaigns(array $request): ServiceDto;
}
