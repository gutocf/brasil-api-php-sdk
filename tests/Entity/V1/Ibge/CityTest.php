<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use Gutocf\BrasilAPI\Entity\V1\Ibge\City;
use PHPUnit\Framework\TestCase;

class CityTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/Ibge/city');
        $city = new City($data);
        $this->assertEquals($city->nome, $data['nome']);
        $this->assertEquals($city->codigo_ibge, $data['codigo_ibge']);
        $this->assertObjectNotHasAttribute('invalid', $city);
    }
}
