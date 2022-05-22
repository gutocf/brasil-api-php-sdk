<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity\V2;

use Gutocf\BrasilAPI\Entity\V2\Cep;
use Gutocf\BrasilAPI\Entity\V2\Location;
use PHPUnit\Framework\TestCase;

class CepTest extends TestCase
{
    public function testProperties(): void
    {
        $data = [
            'cep' => '89010025',
            'state' => 'SC',
            'city' => 'Blumenau',
            'neighborhood' => 'Centro',
            'street' => 'Rua Doutor Luiz de Freitas Melro',
            'service' => 'viacep',
            'location' => [
                'type' => 'Point',
                'coordinates' => [
                    'latitude' => "-26.9085",
                    'longitude' => "-49.068",
                ],
            ],
            'invalid' => 'invalid',
        ];
        $cep = new Cep($data);
        $this->assertEquals($cep->cep, $data['cep']);
        $this->assertEquals($cep->state, $data['state']);
        $this->assertEquals($cep->city, $data['city']);
        $this->assertEquals($cep->neighborhood, $data['neighborhood']);
        $this->assertEquals($cep->street, $data['street']);
        $this->assertEquals($cep->service, $data['service']);
        $this->assertInstanceOf(Location::class, $cep->location);
        $this->assertObjectNotHasAttribute('invalid', $cep);
    }
}
