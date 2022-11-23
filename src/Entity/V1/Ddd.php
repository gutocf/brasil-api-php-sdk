<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1;

use Spatie\DataTransferObject\DataTransferObject;

class Ddd extends DataTransferObject
{
    public ?string $state;

    /**
     * @var string[]
     */
    public ?array $cities;
}
