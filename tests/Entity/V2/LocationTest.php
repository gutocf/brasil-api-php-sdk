<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use Gutocf\BrasilAPI\Entity\V2\Cep\Coordinates;
use Gutocf\BrasilAPI\Entity\V2\Cep\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testProperties(): void
    {
        $data = [
            'type' => 'Point',
            'coordinates' => [
                'latitude' => '-26.9244749',
                'longitude' => '-49.0629788',
            ],
            'invalid' => 'invalid',
        ];
        $location = new Location($data);
        $this->assertEquals($location->type, $data['type']);
        $this->assertInstanceOf(Coordinates::class, $location->coordinates);
        $this->assertObjectNotHasAttribute('invalid', $location);
    }

    public function testPropertiesEmpty(): void
    {
        $data = [];
        $location = new Location($data);
        $this->assertNull($location->type);
        $this->assertNull($location->coordinates);
        $this->assertObjectNotHasAttribute('invalid', $location);
    }
}
