<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use Gutocf\BrasilAPI\Entity\V2\Cep\Coordinates;
use PHPUnit\Framework\TestCase;

class CoordinatesTest extends TestCase
{
    public function testProperties(): void
    {
        $data = [
            'latitude' => '-26.9244749',
            'longitude' => '-49.0629788',
            'invalid' => 'invalid',
        ];
        $coordinates = new Coordinates($data);
        $this->assertEquals($coordinates->latitude, floatval($data['latitude']));
        $this->assertEquals($coordinates->longitude, floatval($data['longitude']));
        $this->assertObjectNotHasAttribute('invalid', $coordinates);
    }

    public function testPropertiesEmpty(): void
    {
        $data = [];
        $coordinates = new Coordinates($data);
        $this->assertNull($coordinates->latitude);
        $this->assertNull($coordinates->longitude);
        $this->assertObjectNotHasAttribute('invalid', $coordinates);
    }
}
