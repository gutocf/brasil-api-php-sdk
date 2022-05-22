<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Cep extends FlexibleDataTransferObject
{
    protected bool $ignoreMissing = true;
    public ?string $cep;
    public ?string $state;
    public ?string $city;
    public ?string $neighborhood;
    public ?string $street;
    public ?string $service;
}
