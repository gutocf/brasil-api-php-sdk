<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V2\Cep;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Coordinates extends FlexibleDataTransferObject
{
    public ?float $latitude;
    public ?float $longitude;


    /**
     * Constructor.
     *
     * @param array<string, mixed> $parameters
     */
    public function __construct(array $parameters = [])
    {
        $parameters['latitude'] = isset($parameters['latitude']) ?
            floatval($parameters['latitude']) :
            null;

        $parameters['longitude'] = isset($parameters['longitude']) ?
            floatval($parameters['longitude']) :
            null;

        parent::__construct($parameters);
    }
}
