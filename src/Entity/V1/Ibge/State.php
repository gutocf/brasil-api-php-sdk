<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1\Ibge;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class State extends FlexibleDataTransferObject
{
    public ?int $id;
    public ?string $sigla;
    public ?string $nome;
    public ?Region $regiao;
}
