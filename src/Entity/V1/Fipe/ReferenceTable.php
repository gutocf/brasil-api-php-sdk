<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1\Fipe;

use Spatie\DataTransferObject\DataTransferObject;

class ReferenceTable extends DataTransferObject
{
    public ?int $codigo;
    public ?string $mes;
}
