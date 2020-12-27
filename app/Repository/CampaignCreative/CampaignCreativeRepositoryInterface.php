<?php

namespace App\Repository\CampaignCreative;

interface CampaignCreativeRepositoryInterface
{
    /**
     * Delete campaign creatives by creative id
     *
     * @param int $campaignId
     * @param int $creativeId
     * @return bool
     */
    public function deleteCreative(int $campaignId, int $creativeId): bool;
}
