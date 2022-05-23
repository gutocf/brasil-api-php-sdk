<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Service\V1;

use Gutocf\BrasilAPI\Adapter\Adapter;
use Gutocf\BrasilAPI\Entity\V1\Bank;
use Gutocf\BrasilAPI\Exception\NotFoundException;
use Gutocf\BrasilAPI\Service\V1\BanksService;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class BanksServiceTest extends TestCase
{
    public function testGet(): void
    {
        $data =loadFixture('Entity/V1/bank');
        $mock = new MockHandler([new Response(200, [], strval(json_encode($data)))]);
        $handlerStack = HandlerStack::create($mock);
        $bankService = new BanksService(new Adapter(new Client(['handler' => $handlerStack])));
        $bank = $bankService->get(1);
        $this->assertInstanceOf(Bank::class, $bank);
        $this->assertEquals($data['ispb'], $bank->ispb);
        $this->assertEquals($data['name'], $bank->name);
        $this->assertEquals($data['code'], $bank->code);
        $this->assertEquals($data['fullName'], $bank->fullName);
    }

    public function testGetInvalid(): void
    {
        $mock = new MockHandler([new Response(404)]);
        $handlerStack = HandlerStack::create($mock);
        $bank = new BanksService(new Adapter(new Client(['handler' => $handlerStack])));
        $this->expectException(NotFoundException::class);
        $bank->get(123456789);
    }

    public function testGetAll(): void
    {
        $data = [
            [
                'ispb' => '00000000',
                'name' => 'BCO DO BRASIL S.A.',
                'code' => 1,
                'fullName' => 'Banco do Brasil S.A.',
            ],
            [
                'ispb' => '00000001',
                'name' => 'BCO ITAU S.A.',
                'code' => 2,
                'fullName' => 'Banco Itaú S.A.',
            ],
        ];
        $mock = new MockHandler([new Response(200, [], strval(json_encode($data)))]);
        $handlerStack = HandlerStack::create($mock);
        $bankService = new BanksService(new Adapter(new Client(['handler' => $handlerStack])));
        $banks = $bankService->getAll();

        $this->assertInstanceOf(Bank::class, $banks[0]);
        $this->assertEquals($data[0]['ispb'], $banks[0]->ispb);
        $this->assertEquals($data[0]['name'], $banks[0]->name);
        $this->assertEquals($data[0]['code'], $banks[0]->code);
        $this->assertEquals($data[0]['fullName'], $banks[0]->fullName);

        $this->assertInstanceOf(Bank::class, $banks[1]);
        $this->assertEquals($data[1]['ispb'], $banks[1]->ispb);
        $this->assertEquals($data[1]['name'], $banks[1]->name);
        $this->assertEquals($data[1]['code'], $banks[1]->code);
        $this->assertEquals($data[1]['fullName'], $banks[1]->fullName);
    }
}
