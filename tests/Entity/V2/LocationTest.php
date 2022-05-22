<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use Gutocf\BrasilAPI\Entity\V2\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testProperties(): void
    {
        $data = [
            'type' => 'Point',
            'coordinates' => [
                'longitude' => '-49.0629788',
                'latitude' => '-26.9244749'
            ],
            'invalid' => 'invalid',
        ];
        $location = new Location($data);
        $this->assertEquals($location->type, $data['type']);
        $this->assertEquals($location->latitude, $data['coordinates']['latitude']);
        $this->assertEquals($location->longitude, $data['coordinates']['longitude']);
        $this->assertObjectNotHasAttribute('invalid', $location);
    }
}
