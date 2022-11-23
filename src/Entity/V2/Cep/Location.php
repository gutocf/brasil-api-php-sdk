<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V2\Cep;

use Spatie\DataTransferObject\DataTransferObject;

class Location extends DataTransferObject
{
    public ?string $type;
    public ?Coordinates $coordinates;
}
