<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1\Ibge;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class City extends FlexibleDataTransferObject
{
    public ?string $nome;
    public ?string $codigo_ibge;
}
