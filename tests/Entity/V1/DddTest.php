<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use Gutocf\BrasilAPI\Entity\V1\Ddd;
use PHPUnit\Framework\TestCase;

class DddTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/ddd');
        $ddd = new Ddd($data);
        $this->assertEquals($ddd->state, $data['state']);
        $this->assertIsArray($ddd->cities);
        $this->assertObjectNotHasProperty('invalid', $ddd);
    }
}
