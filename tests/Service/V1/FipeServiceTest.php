<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Service\V1;

use Gutocf\BrasilAPI\Adapter\Adapter;
use Gutocf\BrasilAPI\Entity\V1\Fipe\Brand;
use Gutocf\BrasilAPI\Entity\V1\Fipe\Enum\VehicleType;
use Gutocf\BrasilAPI\Entity\V1\Fipe\ReferenceTable;
use Gutocf\BrasilAPI\Entity\V1\Fipe\Vehicle;
use Gutocf\BrasilAPI\Exception\BadRequestException;
use Gutocf\BrasilAPI\Exception\InternalServerErrorException;
use Gutocf\BrasilAPI\Exception\NotFoundException;
use Gutocf\BrasilAPI\Service\V1\FipeService;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class FipeServiceTest extends TestCase
{
    public function testGetAllVehicleByCode(): void
    {
        $data = loadFixture('Entity/V1/Fipe/vehicles');
        $mock = new MockHandler([
            new Response(200, [], strval(json_encode($data))),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $fipeService = new FipeService(new Adapter(new Client(['handler' => $handlerStack])));
        $vehicles = $fipeService->getAllVehicleByCode('003281-6');
        $this->assertInstanceOf(Vehicle::class, $vehicles[0]);
        $this->assertEquals($vehicles[0]->modelo, $data[0]['modelo']);
    }

    public function testGetReferenceTables(): void
    {
        $data = loadFixture('Entity/V1/Fipe/reference-tables');
        $mock = new MockHandler([
            new Response(200, [], strval(json_encode($data))),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $fipeService = new FipeService(new Adapter(new Client(['handler' => $handlerStack])));
        $referenceTables = $fipeService->getReferenceTables();
        $this->assertInstanceOf(ReferenceTable::class, $referenceTables[0]);
        $this->assertEquals($referenceTables[0]->codigo, $data[0]['codigo']);
    }

    public function testGetAllBrandsByType(): void
    {
        $data = loadFixture('Entity/V1/Fipe/brands');
        $mock = new MockHandler([
            new Response(200, [], strval(json_encode($data))),
            new Response(200, [], strval(json_encode($data))),
            new Response(200, [], strval(json_encode($data))),
            new Response(400),
            new Response(404),
            new Response(500),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $fipeService = new FipeService(new Adapter(new Client(['handler' => $handlerStack])));

        $brands = $fipeService->getAllBrandsByType(VehicleType::CARS());
        $this->assertSameSize($brands, $data);
        $this->assertInstanceOf(Brand::class, $brands[0]);

        $brands = $fipeService->getAllBrandsByType(VehicleType::CARS(), 1);
        $this->assertSameSize($brands, $data);
        $this->assertInstanceOf(Brand::class, $brands[0]);

        $brands = $fipeService->getAllBrandsByType();
        $this->assertSameSize($brands, $data);
        $this->assertInstanceOf(Brand::class, $brands[0]);

        $this->expectException(BadRequestException::class);
        $fipeService->getAllBrandsByType();

        $this->expectException(NotFoundException::class);
        $fipeService->getAllBrandsByType();

        $this->expectException(InternalServerErrorException::class);
        $fipeService->getAllBrandsByType();
    }
}
