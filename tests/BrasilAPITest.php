<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Service;

use Gutocf\BrasilAPI\BrasilAPI;
use Gutocf\BrasilAPI\Service\V1\BanksService as V1BanksService;
use Gutocf\BrasilAPI\Service\V1\CepService as V1CepService;
use Gutocf\BrasilAPI\Service\V1\CnpjService as V1CnpjService;
use Gutocf\BrasilAPI\Service\V1\DddService as V1DddService;
use Gutocf\BrasilAPI\Service\V1\FipeService as V1FipeService;
use Gutocf\BrasilAPI\Service\V1\HolidaysService as V1HolidaysService;
use Gutocf\BrasilAPI\Service\V2\CepService as V2CepService;
use PHPUnit\Framework\TestCase;

class BrasilAPITest extends TestCase
{
    private BrasilAPI $BrasilAPI;

    public function setUp(): void
    {
        $this->BrasilAPI = new BrasilAPI();
    }

    public function testCepV1(): void
    {
        $service = $this->BrasilAPI->cepV1();
        $this->assertInstanceOf(V1CepService::class, $service);
    }

    public function testCepV2(): void
    {
        $service = $this->BrasilAPI->cepV2();
        $this->assertInstanceOf(V2CepService::class, $service);
    }

    public function testBanksV1(): void
    {
        $service = $this->BrasilAPI->banksV1();
        $this->assertInstanceOf(V1BanksService::class, $service);
    }

    public function testHolidaysV1(): void
    {
        $service = $this->BrasilAPI->holidaysV1();
        $this->assertInstanceOf(V1HolidaysService::class, $service);
    }

    public function testCnpjV1(): void
    {
        $service = $this->BrasilAPI->cnpjV1();
        $this->assertInstanceOf(V1CnpjService::class, $service);
    }

    public function testDddV1(): void
    {
        $service = $this->BrasilAPI->dddV1();
        $this->assertInstanceOf(V1DddService::class, $service);
    }

    public function testFipeV1(): void
    {
        $service = $this->BrasilAPI->fipeV1();
        $this->assertInstanceOf(V1FipeService::class, $service);
    }
}
