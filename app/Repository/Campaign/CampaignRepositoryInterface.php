<?php

namespace App\Repository\Campaign;

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
}
