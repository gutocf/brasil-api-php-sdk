<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Service;

use Gutocf\BrasilAPI\Service\Enum\Service;
use Gutocf\BrasilAPI\Service\Enum\Version;
use Gutocf\BrasilAPI\Service\ServiceFactory;
use Gutocf\BrasilAPI\Service\V1\CepService as V1CepService;
use Gutocf\BrasilAPI\Service\V2\CepService as V2CepService;
use PHPUnit\Framework\TestCase;

class ServiceFactoryTest extends TestCase
{
    public function testGetService(): void
    {
        $service = ServiceFactory::get(Service::CEP(), Version::V1());
        $this->assertInstanceOf(V1CepService::class, $service);

        $service = ServiceFactory::get(Service::CEP(), Version::V2());
        $this->assertInstanceOf(V2CepService::class, $service);
    }
}
