<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Service;

use Gutocf\BrasilAPI\Adapter\Adapter;
use Gutocf\BrasilAPI\Entity\Cep as EntityCep;
use Gutocf\BrasilAPI\Exception\NotFoundException;
use Gutocf\BrasilAPI\Service\CepService;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class CepServiceTest extends TestCase
{

    public function testGet(): void
    {
        $data = [
            'cep' => '89010025',
            'state' => 'SC',
            'city' => 'Blumenau',
            'neighborhood' => 'Centro',
            'street' => 'Rua Doutor Luiz de Freitas Melro',
            'service' => 'viacep',
        ];
        $mock = new MockHandler([new Response(200, [], strval(json_encode($data)))]);
        $handlerStack = HandlerStack::create($mock);
        $cepService = new CepService(new Adapter(new Client(['handler' => $handlerStack])));
        $cep = $cepService->get('89010025');
        $this->assertInstanceOf(EntityCep::class, $cep);
        $this->assertEquals($cep->cep, $data['cep']);
        $this->assertEquals($cep->state, $data['state']);
        $this->assertEquals($cep->city, $data['city']);
        $this->assertEquals($cep->neighborhood, $data['neighborhood']);
        $this->assertEquals($cep->street, $data['street']);
        $this->assertEquals($cep->service, $data['service']);
    }

    public function testGetInvalid(): void
    {
        $mock = new MockHandler([new Response(404)]);
        $handlerStack = HandlerStack::create($mock);
        $cep = new CepService(new Adapter(new Client(['handler' => $handlerStack])));
        $this->expectException(NotFoundException::class);

        $cep->get('invalid');
    }
}
