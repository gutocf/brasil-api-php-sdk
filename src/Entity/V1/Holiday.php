<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1;

use DateTime;
use Gutocf\BrasilAPI\Caster\DateTimeCaster;
use Spatie\DataTransferObject\Attributes\DefaultCast;
use Spatie\DataTransferObject\DataTransferObject;

#[DefaultCast(DateTime::class, DateTimeCaster::class)]
class Holiday extends DataTransferObject
{
    public ?DateTime $date;
    public ?string $name;
    public ?string $type;
}
