<?php

namespace App\Repository\Campaign;

use App\Models\Campaign;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CampaignRepositoryInterface
{
    /**
     * Get campaigns with creatives paginated data
     *
     * @param int $pageNo
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getCampaigns(int $pageNo, int $perPage = 20): LengthAwarePaginator;

    /**
     * Store campaign in campaigns tables and creatives in campaign_creatives
     *
     * @param array $campaign
     * @param array $creatives
     * @return Campaign
     */
    public function createCampaign(array $campaign, array $creatives): Campaign;


    /**
     * Update campaign via campign id
     *
     * @param $campaignId
     * @param $campaignUpdateData
     * @param $creatives
     * @return Campaign
     */
    public function updateCampaign($campaignId, $campaignUpdateData, $creatives): Campaign;
}
