<?php

namespace App\Repository\Campaign;

use App\Models\Campaign;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
}
