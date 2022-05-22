<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity\V2;

use Gutocf\BrasilAPI\Entity\V2\Cep;
use Gutocf\BrasilAPI\Entity\V2\Cep\Coordinates;
use Gutocf\BrasilAPI\Entity\V2\Cep\Location;
use PHPUnit\Framework\TestCase;

class CepTest extends TestCase
{
    public function testProperties(): void
    {
        $data = [
            'cep' => '88045540',
            'state' => 'SC',
            'city' => 'Florianópolis',
            'neighborhood' => 'Saco dos Limões',
            'street' => 'Travessa da Amizade',
            'service' => 'correios',
            'location' => [
                'type' => 'Point',
                'coordinates' => [
                    'longitude' => '-48.5334395',
                    'latitude' => '-27.6086806'
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
        $this->assertInstanceOf(Coordinates::class, $cep->location->coordinates);
        $this->assertObjectNotHasAttribute('invalid', $cep);
    }
}
