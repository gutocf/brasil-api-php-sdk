<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Service\V1;

use Gutocf\BrasilAPI\Adapter\Adapter;
use Gutocf\BrasilAPI\Entity\V1\Cnpj;
use Gutocf\BrasilAPI\Exception\NotFoundException;
use Gutocf\BrasilAPI\Service\V1\CnpjService;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class CnpjServiceTest extends TestCase
{
    public function testGet(): void
    {
        $data = loadFixture('Entity/V1/cnpj');
        $mock = new MockHandler([new Response(200, [], strval(json_encode($data)))]);
        $handlerStack = HandlerStack::create($mock);
        $cnpjService = new CnpjService(new Adapter(new Client(['handler' => $handlerStack])));
        $cnpj = $cnpjService->get('39729684000100');
        $this->assertInstanceOf(Cnpj::class, $cnpj);
        $this->assertEquals($cnpj->cnpj, $data['cnpj']);
    }

    public function testGetInvalid(): void
    {
        $mock = new MockHandler([new Response(404)]);
        $handlerStack = HandlerStack::create($mock);
        $cnpj = new CnpjService(new Adapter(new Client(['handler' => $handlerStack])));
        $this->expectException(NotFoundException::class);
        $cnpj->get('invalid');
    }
}
