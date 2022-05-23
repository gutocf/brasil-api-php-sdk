<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1;

use DateTime;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Holiday extends FlexibleDataTransferObject
{
    public ?DateTime $date;
    public ?string $name;
    public ?string $type;

    public function __construct(array $parameters = [])
    {
        $date = DateTime::createFromFormat('Y-m-d', $parameters['date']);
        $parameters['date'] = $date ? $date : null;

        parent::__construct($parameters);
    }
}
