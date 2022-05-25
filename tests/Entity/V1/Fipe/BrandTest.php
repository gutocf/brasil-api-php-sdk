<?php

namespace Gutocf\BrasilAPI\Tests\Entity\V1\Fipe;

use Gutocf\BrasilAPI\Entity\V1\Fipe\Brand;
use PHPUnit\Framework\TestCase;

class BrandTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/Fipe/brand');
        $brand = new Brand($data);
        $this->assertEquals($brand->name, $data['nome']);
        $this->assertEquals($brand->value, $data['valor']);
        $this->assertObjectNotHasAttribute('invalid', $brand);
    }
}
