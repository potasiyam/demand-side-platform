<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCampaign;
use App\Http\Requests\GetCampaigns;
use App\Http\Requests\UpdateCampaign;
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
            return ApiResponseTransformer::error(
                $e->getMessage(),
                'Get campaigns request failed',
                $e->getCode() ? $e->getCode() : 400
            );
        }
    }

    /**
     * @param $campaignId
     * @return JsonResponse
     */
    public function getCampaignDetails(int $campaignId): JsonResponse
    {
        try {
            $campaign = $this->campaignService->getCampaignDetails($campaignId);

            return ApiResponseTransformer::success($campaign->data, $campaign->message, $campaign->statusCode);
        } catch (Exception $e) {
            return ApiResponseTransformer::error(
                $e->getMessage(),
                'Campaign not found',
                $e->getCode() ? $e->getCode() : 400
            );
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
            return ApiResponseTransformer::error(
                $e->getMessage(),
                'Campaign create failed',
                $e->getCode() ? $e->getCode() : 400
            );
        }
    }

    /**
     * @param int $campaignId
     * @param UpdateCampaign $request
     * @return JsonResponse
     */
    public function updateCampaign(int $campaignId, UpdateCampaign $request): JsonResponse
    {
        try {
            $validated = $request->validated();

            $campaign = $this->campaignService->updateCampaign($campaignId, $validated);

            return ApiResponseTransformer::success($campaign->data, $campaign->message, $campaign->statusCode);
        } catch (Exception $e) {
            return ApiResponseTransformer::error(
                $e->getMessage(),
                'Campaign update failed',
                $e->getCode() ? $e->getCode() : 400
            );
        }
    }

    /**
     * @param int $campaignId
     * @param int $creativeId
     * @return JsonResponse
     */
    public function deleteCampaignCreative(int $campaignId, int $creativeId): JsonResponse
    {
        try {
            $response = $this->campaignService->deleteCampaignCreative($campaignId, $creativeId);

            return ApiResponseTransformer::success($response->data, $response->message, $response->statusCode);
        } catch (Exception $e) {
            return ApiResponseTransformer::error(
                $e->getMessage(),
                'Campaign creative delete failed',
                $e->getCode() ? $e->getCode() : 400
            );
        }
    }
}
