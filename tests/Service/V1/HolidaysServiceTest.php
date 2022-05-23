<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Service\V1;

use DateTime;
use Gutocf\BrasilAPI\Adapter\Adapter;
use Gutocf\BrasilAPI\Entity\V1\Holiday;
use Gutocf\BrasilAPI\Exception\InternalServerErrorException;
use Gutocf\BrasilAPI\Exception\NotFoundException;
use Gutocf\BrasilAPI\Service\V1\HolidaysService;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class HolidaysServiceTest extends TestCase
{
    public function testGetByYear(): void
    {
        $data = [
            [
                'date' => '2022-01-01',
                'name' => 'Confraternização mundial',
                'type' => 'national',
            ],
            [
                'date' => '2022-03-07',
                'name' => 'Dia do Fusileiro Naval',
                'type' => 'national',
            ],
        ];
        $mock = new MockHandler([new Response(200, [], strval(json_encode($data)))]);
        $handlerStack = HandlerStack::create($mock);
        $holidayService = new HolidaysService(new Adapter(new Client(['handler' => $handlerStack])));
        $holidays = $holidayService->getByYear(2022);
        $this->assertSameSize($holidays, $data);
        $this->assertInstanceOf(Holiday::class, $holidays[0]);
        $this->assertInstanceOf(DateTime::class, $holidays[0]->date);
        $this->assertEquals('2022-01-01', $holidays[0]->date->format('Y-m-d'));
        $this->assertEquals($data[0]['name'], $holidays[0]->name);
        $this->assertEquals($data[0]['type'], $holidays[0]->type);
    }

    public function testGetByYearNotFound(): void
    {
        $mock = new MockHandler([new Response(404)]);
        $handlerStack = HandlerStack::create($mock);
        $holidayService = new HolidaysService(new Adapter(new Client(['handler' => $handlerStack])));
        $this->expectException(NotFoundException::class);
        $holidayService->getByYear(2022);
    }

    public function testGetByYearInternalServerError(): void
    {
        $mock = new MockHandler([new Response(500)]);
        $handlerStack = HandlerStack::create($mock);
        $holidayService = new HolidaysService(new Adapter(new Client(['handler' => $handlerStack])));
        $this->expectException(InternalServerErrorException::class);
        $holidayService->getByYear(2022);
    }
}
