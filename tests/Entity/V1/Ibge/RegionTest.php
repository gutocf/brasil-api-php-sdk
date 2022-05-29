<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use Gutocf\BrasilAPI\Entity\V1\Ibge\Region;
use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/Ibge/region');
        $region = new Region($data);
        $this->assertEquals($region->id, $data['id']);
        $this->assertEquals($region->sigla, $data['sigla']);
        $this->assertEquals($region->nome, $data['nome']);
        $this->assertObjectNotHasAttribute('invalid', $region);
    }
}
