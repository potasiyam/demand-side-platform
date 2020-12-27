<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCampaign;
use App\Http\Requests\GetCampaigns;
use App\Service\Campaign\CampaignServiceInterface;
use App\Transformer\ApiResponseTransformer;
use Exception;
use Illuminate\Http\JsonResponse;

class CampaignController extends Controller
{
    private $campaignService;

    public function __construct(CampaignServiceInterface $campaignService)
    {
        $this->campaignService = $campaignService;
    }

    /**
     * @param GetCampaigns $request
     * @return JsonResponse
     */
    public function getCampaigns(GetCampaigns $request): JsonResponse
    {
        try {
            $validated = $request->validated();

            $campaigns = $this->campaignService->getCampaigns($validated);

            return ApiResponseTransformer::success($campaigns->data, $campaigns->message, $campaigns->statusCode);
        } catch (Exception $e) {
            return ApiResponseTransformer::error($e->getMessage(), 'Get campaigns request failed', $e->getCode());
        }
    }

    /**
     * @param CreateCampaign $request
     * @return JsonResponse
     */
    public function createCampaign(CreateCampaign $request): JsonResponse
    {
        try {
            $validated = $request->validated();

            $campaign = $this->campaignService->createCampaign($validated);

            return ApiResponseTransformer::success($campaign->data, $campaign->message, $campaign->statusCode);
        } catch (Exception $e) {
            return ApiResponseTransformer::error($e->getMessage(), 'Campaign create failed', $e->getCode());
        }
    }
}
