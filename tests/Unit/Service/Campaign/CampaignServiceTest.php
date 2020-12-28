<?php

namespace Service\Campaign;

use App\Contracts\ServiceDto;
use App\Repository\Campaign\CampaignRepositoryInterface;
use App\Repository\CampaignCreative\CampaignCreativeRepositoryInterface;
use App\Service\Campaign\CampaignService;
use Illuminate\Pagination\LengthAwarePaginator;
use PHPUnit\Framework\TestCase;

class CampaignServiceTest extends TestCase
{
    /**
     * @var CampaignService
     */
    private $service;
    /**
     * @var CampaignRepositoryInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    private $campaignRepository;
    /**
     * @var CampaignCreativeRepositoryInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    private $campaignCreativeRepository;

    protected function setUp(): void
    {
        $this->campaignRepository = $this->createMock(CampaignRepositoryInterface::class);
        $this->campaignCreativeRepository = $this->createMock(CampaignCreativeRepositoryInterface::class);
        $this->service = new CampaignService($this->campaignRepository, $this->campaignCreativeRepository);
    }

    public function testGetCampaignsReturnsCampaigns()
    {
        $request = [];
        $request["page"] = 1;
        $queryResult = $this->createMock(LengthAwarePaginator::class);
        $this->campaignRepository->expects(static::once())->method('getCampaigns')->with(1)
            ->willReturn($queryResult);
        $result = $this->service->getCampaigns($request);
        static::assertInstanceOf(ServiceDto::class, $result);
        static::assertSame('Campaigns fetched for page 1', $result->message);
        static::assertSame(200, $result->statusCode);
        static::assertSame($queryResult, $result->data);
    }
}
