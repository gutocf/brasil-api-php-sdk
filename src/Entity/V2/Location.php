<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V2;

use Gutocf\BrasilAPI\Entity\AbstractEntity;

class Location extends AbstractEntity
{
    public ?string $type;
    public ?float $latitude;
    public ?float $longitude;

    public function setData(array $data): void
    {
        $this->type = $data['type'] ?? null;
        $this->latitude = floatval($data['coordinates']['latitude'] ?? null);
        $this->longitude = floatval($data['coordinates']['longitude'] ?? null);
    }
}
