<?php

namespace Gutocf\BrasilAPI\Tests\Entity\V1\Fipe;

use Gutocf\BrasilAPI\Entity\V1\Fipe\Vehicle;
use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/Fipe/vehicle');
        $vehicle = new Vehicle($data);
        $this->assertEquals($vehicle->valor, 12707.00);
        $this->assertEquals($vehicle->marca, $data['marca']);
        $this->assertEquals($vehicle->modelo, $data['modelo']);
        $this->assertEquals($vehicle->anoModelo, $data['anoModelo']);
        $this->assertEquals($vehicle->combustivel, $data['combustivel']);
        $this->assertEquals($vehicle->codigoFipe, $data['codigoFipe']);
        $this->assertEquals($vehicle->mesReferencia, $data['mesReferencia']);
        $this->assertEquals($vehicle->tipoVeiculo, $data['tipoVeiculo']);
        $this->assertEquals($vehicle->siglaCombustivel, $data['siglaCombustivel']);
        $this->assertEquals($vehicle->dataConsulta, $data['dataConsulta']);
        $this->assertObjectNotHasProperty('invalid', $vehicle);
    }
}
