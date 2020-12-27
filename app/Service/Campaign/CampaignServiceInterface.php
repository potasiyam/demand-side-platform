<?php

namespace App\Service\Campaign;

use App\Contracts\ServiceDto;
use Exception;

interface CampaignServiceInterface
{
    /**
     * Get the list of campaigns
     *
     * @param array $request
     * @return ServiceDto
     * @throws Exception
     */
    public function getCampaigns(array $request): ServiceDto;

    /**
     * Creates campaign
     *
     * @param array $request
     * @return ServiceDto
     * @throws Exception
     */
    public function createCampaign(array $request): ServiceDto;
}
