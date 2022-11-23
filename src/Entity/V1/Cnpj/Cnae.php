<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1\Cnpj;

use Spatie\DataTransferObject\DataTransferObject;

class Cnae extends DataTransferObject
{
    public ?int $codigo;
    public ?string $descricao;
}
