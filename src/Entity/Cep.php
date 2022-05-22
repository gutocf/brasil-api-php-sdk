<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity;

class Cep extends AbstractEntity
{
    public ?string $cep;
    public ?string $state;
    public ?string $city;
    public ?string $neighborhood;
    public ?string $street;
    public ?string $service;
}
