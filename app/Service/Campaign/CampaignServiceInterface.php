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

    /**
     * Update campaign
     *
     * @param int $campaignId
     * @param array $request
     * @return ServiceDto
     * @throws Exception
     */
    public function updateCampaign(int $campaignId, array $request): ServiceDto;

    /**
     * Delete campaign creative
     *
     * @param int $campaignId
     * @param int $creativeId
     * @return ServiceDto
     * @throws Exception
     */
    public function deleteCampaignCreative(int $campaignId, int $creativeId): ServiceDto;
}
