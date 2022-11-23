<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1\Ibge;

use Spatie\DataTransferObject\DataTransferObject;

class City extends DataTransferObject
{
    public ?string $nome;
    public ?string $codigo_ibge;
}
