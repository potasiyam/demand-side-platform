<?php

namespace App\Repository\Campaign;

use App\Models\Campaign;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class CampaignRepository implements CampaignRepositoryInterface
{
    private $campaign;

    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * Get campaigns with creatives paginated data
     *
     * @param int $pageNo
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getCampaigns(int $pageNo, int $perPage = 100): LengthAwarePaginator
    {
        return $this->campaign
            ->with('creatives')
            ->orderBy('id', 'desc')
            ->paginate($perPage, ['*'], 'page', $pageNo);
    }

    /**
     * Get campaign details
     *
     * @param $campaignId
     * @return Model|object|null
     */
    public function getCampaignDetails($campaignId)
    {
        return $this->campaign
            ->with('creatives')
            ->where('id', $campaignId)
            ->first();
    }

    /**
     * Store campaign in campaigns tables and creatives in campaign_creatives
     *
     * @param array $campaign
     * @param array $creatives
     * @return Campaign
     */
    public function createCampaign(array $campaign, array $creatives): Campaign
    {
        $campaign = $this->campaign->create($campaign);

        $this->insertCreatives($campaign, $creatives);

        return $campaign;
    }

    /**
     * Update campaign via campign id
     *
     * @param $campaignId
     * @param $campaignUpdateData
     * @param $creatives
     * @return Campaign
     */
    public function updateCampaign($campaignId, $campaignUpdateData, $creatives): Campaign
    {
        $campaign = $this->campaign->where('id', $campaignId)->first();

        foreach ($campaignUpdateData as $index => $value) {
            $campaign->{$index} = $value;
        }

        $campaign->save();

        $this->insertCreatives($campaign, $creatives);

        return $campaign;
    }

    /**
     * @param Campaign $campaign
     * @param array $creatives
     */
    private function insertCreatives(Campaign $campaign, array $creatives): void
    {
        foreach ($creatives as $creative) {
            $campaign->creatives()->create($creative);
        }
    }
}
