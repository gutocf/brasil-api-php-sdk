<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V2;

use Gutocf\BrasilAPI\Entity\V2\Cep\Location;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Cep extends FlexibleDataTransferObject
{
    public ?string $cep;
    public ?string $state;
    public ?string $city;
    public ?string $neighborhood;
    public ?string $street;
    public ?string $service;
    public ?Location $location;
}
