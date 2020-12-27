<?php

namespace App\Repository\Campaign;

use App\Models\Campaign;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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
    public function getCampaigns(int $pageNo, int $perPage = 20): LengthAwarePaginator
    {
        return $this->campaign
            ->with('creatives')
            ->orderBy('id', 'desc')
            ->paginate($perPage, ['*'], 'page', $pageNo);
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
