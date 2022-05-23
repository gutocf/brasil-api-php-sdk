<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Ddd extends FlexibleDataTransferObject
{
    public ?string $state;

    /**
     * @var string[]
     */
    public ?array $cities;
}
