<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity;

use Spatie\DataTransferObject\DataTransferObject;

class ApiError extends DataTransferObject
{
    public ?string $message;
    public ?string $name;
    public ?string $type;
}
