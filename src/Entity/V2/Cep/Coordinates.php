<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V2\Cep;

use Spatie\DataTransferObject\DataTransferObject;

class Coordinates extends DataTransferObject
{
    public ?float $latitude;
    public ?float $longitude;
}
