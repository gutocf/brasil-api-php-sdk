<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use Gutocf\BrasilAPI\Entity\V1\Cep;
use PHPUnit\Framework\TestCase;

class CepTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/cep');
        $cep = new Cep($data);
        $this->assertEquals($cep->cep, $data['cep']);
        $this->assertEquals($cep->state, $data['state']);
        $this->assertEquals($cep->city, $data['city']);
        $this->assertEquals($cep->neighborhood, $data['neighborhood']);
        $this->assertEquals($cep->street, $data['street']);
        $this->assertEquals($cep->service, $data['service']);
        $this->assertObjectNotHasProperty('invalid', $cep);
    }
}
