<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V2\Cep;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Location extends FlexibleDataTransferObject
{
    public ?string $type;
    public ?Coordinates $coordinates;
}
