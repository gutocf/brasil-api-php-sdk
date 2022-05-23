<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1\Cnpj;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Cnae extends FlexibleDataTransferObject
{
    public ?int $codigo;
    public ?string $descricao;
}
