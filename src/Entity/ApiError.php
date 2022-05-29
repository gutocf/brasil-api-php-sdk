<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class ApiError extends FlexibleDataTransferObject
{
    public ?string $message;
    public ?string $name;
    public ?string $type;
}
