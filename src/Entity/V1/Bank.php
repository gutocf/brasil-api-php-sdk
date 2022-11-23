<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1;

use Spatie\DataTransferObject\DataTransferObject;

class Bank extends DataTransferObject
{
    public ?string $ispb;
    public ?string $name;
    public ?int $code;
    public ?string $fullName;
}
