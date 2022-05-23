<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Service\V1;

use Gutocf\BrasilAPI\Adapter\Adapter;
use Gutocf\BrasilAPI\Entity\V1\Ddd;
use Gutocf\BrasilAPI\Exception\InternalServerErrorException;
use Gutocf\BrasilAPI\Exception\NotFoundException;
use Gutocf\BrasilAPI\Service\V1\DddService;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class DddServiceTest extends TestCase
{
    public function testGet(): void
    {
        $data = loadFixture('Entity/V1/ddd');
        $mock = new MockHandler([new Response(200, [], strval(json_encode($data)))]);
        $handlerStack = HandlerStack::create($mock);
        $dddService = new DddService(new Adapter(new Client(['handler' => $handlerStack])));
        $ddd = $dddService->get(48);
        $this->assertInstanceOf(Ddd::class, $ddd);
        $this->assertEquals($ddd->state, $data['state']);
        $this->assertIsArray($ddd->cities);
        $this->assertEquals($ddd->cities[0], $data['cities'][0]);
        $this->assertObjectNotHasAttribute('invalid', $ddd);
    }

    public function testGetNotFound(): void
    {
        $mock = new MockHandler([new Response(404)]);
        $handlerStack = HandlerStack::create($mock);
        $dddService = new DddService(new Adapter(new Client(['handler' => $handlerStack])));
        $this->expectException(NotFoundException::class);
        $dddService->get(48);
    }

    public function testGetInternalServerError(): void
    {
        $mock = new MockHandler([new Response(500)]);
        $handlerStack = HandlerStack::create($mock);
        $dddService = new DddService(new Adapter(new Client(['handler' => $handlerStack])));
        $this->expectException(InternalServerErrorException::class);
        $dddService->get(48);
    }
}
