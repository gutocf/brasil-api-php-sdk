<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V2;

use Gutocf\BrasilAPI\Entity\AbstractEntity;

class Cep extends AbstractEntity
{
    public ?string $cep;
    public ?string $state;
    public ?string $city;
    public ?string $neighborhood;
    public ?string $street;
    public ?string $service;
    public ?Location $location;

    public function setData(array $data): void
    {
        foreach ($data as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $property === 'location' ?
                    new Location($value) :
                    $value;
            }
        }
    }
}
