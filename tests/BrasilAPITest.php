<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Service;

use Gutocf\BrasilAPI\BrasilAPI;
use Gutocf\BrasilAPI\Service\V1\BanksService;
use Gutocf\BrasilAPI\Service\V1\CepService as V1CepService;
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
        $this->assertInstanceOf(BanksService::class, $service);
    }
}
