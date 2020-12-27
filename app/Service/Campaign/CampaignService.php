<?php

namespace App\Service\Campaign;

use App\Contracts\ServiceDto;
use App\Repository\Campaign\CampaignRepositoryInterface;
use Exception;

class CampaignService implements CampaignServiceInterface
{
    private $campaignRepository;

    public function __construct(CampaignRepositoryInterface $campaignRepository)
    {
        $this->campaignRepository = $campaignRepository;
    }

    /**
     * @param array $request
     * @return ServiceDto
     * @throws Exception
     */
    public function getCampaigns(array $request): ServiceDto
    {
        try {
            $pageNo = $request["page"];

            $campaigns = $this->campaignRepository->getCampaigns($pageNo);

            return new ServiceDto("Campaigns fetched for page $pageNo", 200, $campaigns);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
