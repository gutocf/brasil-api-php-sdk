<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1\Fipe;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class ReferenceTable extends FlexibleDataTransferObject
{
    public ?int $codigo;
    public ?string $mes;
}
