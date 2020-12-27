<?php

namespace App\Service\Campaign;

use App\Contracts\ServiceDto;
use App\Repository\Campaign\CampaignRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Storage;

class CampaignService implements CampaignServiceInterface
{
    private $campaignRepository;

    public function __construct(CampaignRepositoryInterface $campaignRepository)
    {
        $this->campaignRepository = $campaignRepository;
    }

    /**
     * Get the list of campaigns
     *
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

    /**
     * Creates campaign
     *
     * @param array $request
     * @return ServiceDto
     * @throws Exception
     */
    public function createCampaign(array $request): ServiceDto
    {
        try {
            $campaign['name'] = $request['name'];
            $campaign['start_date'] = $request['start_date'];
            $campaign['end_date'] = $request['end_date'];
            $campaign['total_budget'] = $request['total_budget'];
            $campaign['daily_budget'] = $request['daily_budget'];

            $creatives = $this->uploadCreatives($request['creatives']);

            $campaign = $this->campaignRepository->createCampaign($campaign, $creatives);

            return new ServiceDto("Campaign $campaign->name created", 200, $campaign);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Upload images in storage and returns array with file name,
     * file extension and file path
     *
     * @param array $creatives
     * @return array
     */
    private function uploadCreatives(array $creatives): array
    {
        $uploadedCreatives = [];

        foreach ($creatives as $key => $creative) {
            $name = time() . '_' . $creative->getClientOriginalName();

            $extension = explode('.', $name);
            $extension = end($extension);

            Storage::put($name, file_get_contents($creative));

            $uploadedCreatives[$key] = [
                'file_name' => $name,
                'file_path' => Storage::url($name),
                'file_extension' => $extension
            ];
        }

        return $uploadedCreatives;
    }
}
