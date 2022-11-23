<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use DateTime;
use Gutocf\BrasilAPI\Caster\DateTimeCaster;
use PHPUnit\Framework\TestCase;

class DateTimeCasterTest extends TestCase
{
    private DateTimeCaster $Caster;

    public function setUp(): void
    {
        $this->Caster = new DateTimeCaster();
    }

    public function testCast(): void
    {
        $date = $this->Caster->cast('1981-07-03');
        $this->assertInstanceOf(DateTime::class, $date);
    }

    public function testCastInvalid(): void
    {
        $invalid = $this->Caster->cast('abc123');
        $this->assertNull($invalid);
    }
}
