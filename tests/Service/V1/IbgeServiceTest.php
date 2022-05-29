<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Service\V1;

use Gutocf\BrasilAPI\Adapter\Adapter;
use Gutocf\BrasilAPI\Entity\V1\Ibge\City;
use Gutocf\BrasilAPI\Entity\V1\Ibge\State;
use Gutocf\BrasilAPI\Service\V1\IbgeService;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class IbgeServiceTest extends TestCase
{
    public function testGetCitiesByState(): void
    {
        $data = loadFixture('Entity/V1/Ibge/cities');
        $mock = new MockHandler([new Response(200, [], strval(json_encode($data)))]);
        $handlerStack = HandlerStack::create($mock);
        $ibgeService = new IbgeService(new Adapter(new Client(['handler' => $handlerStack])));
        $cities = $ibgeService->getCitiesByState('sc');
        $this->assertInstanceOf(City::class, $cities[0]);
    }

    public function testGetCitiesByStateNotFound(): void
    {
        $mock = new MockHandler([new Response(404)]);
        $handlerStack = HandlerStack::create($mock);
        $ibgeService = new IbgeService(new Adapter(new Client(['handler' => $handlerStack])));
        $this->expectException(\Gutocf\BrasilAPI\Exception\NotFoundException::class);
        $ibgeService->getCitiesByState('invalid');
    }

    public function testGetAllStates(): void
    {
        $data = loadFixture('Entity/V1/Ibge/states');
        $mock = new MockHandler([
            new Response(200, [], strval(json_encode($data))),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $ibgeService = new IbgeService(new Adapter(new Client(['handler' => $handlerStack])));

        $states = $ibgeService->getAllStates();
        $this->assertInstanceOf(State::class, $states[0]);
    }

    public function testGetState(): void
    {
        $data = loadFixture('Entity/V1/Ibge/states');
        $mock = new MockHandler([
            new Response(200, [], strval(json_encode($data))),
            new Response(200, [], strval(json_encode($data))),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $ibgeService = new IbgeService(new Adapter(new Client(['handler' => $handlerStack])));

        $state = $ibgeService->getState('sc');
        $this->assertInstanceOf(State::class, $state);

        $state = $ibgeService->getState(42);
        $this->assertInstanceOf(State::class, $state);
    }
}
