<?php

namespace App\Repository\CampaignCreative;

use App\Models\CampaignCreative;

class CampaignCreativeRepository implements CampaignCreativeRepositoryInterface
{
    private $campaignCreative;

    public function __construct(CampaignCreative $campaignCreative)
    {
        $this->campaignCreative = $campaignCreative;
    }

    /**
     * @param int $campaignId
     * @param int $creativeId
     * @return bool
     */
    public function deleteCreative(int $campaignId, int $creativeId): bool
    {
        return $this->campaignCreative
            ->where('id', $creativeId)
            ->where('campaign_id', $campaignId)
            ->delete();
    }
}
