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
        $data = [
            'date' => '2021-01-01',
            'name' => 'Confraternização mundial',
            'type' => 'national',
             'invalid' => 'invalid',
        ];
        $holiday = new Holiday($data);
        $this->assertInstanceOf(DateTime::class, $holiday->date);
        $this->assertEquals($holiday->name, $data['name']);
        $this->assertEquals($holiday->type, $data['type']);
        $this->assertObjectNotHasAttribute('invalid', $holiday);
    }
}
