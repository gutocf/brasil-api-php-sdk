<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use DateTime;
use Gutocf\BrasilAPI\Entity\V1\Holiday;
use PHPUnit\Framework\TestCase;

class HolidayTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/holiday');
        $holiday = new Holiday($data);
        $this->assertInstanceOf(DateTime::class, $holiday->date);
        $this->assertEquals($holiday->name, $data['name']);
        $this->assertEquals($holiday->type, $data['type']);
        $this->assertObjectNotHasAttribute('invalid', $holiday);
    }
}
