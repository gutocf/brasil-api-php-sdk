<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1\Fipe;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Brand extends FlexibleDataTransferObject
{
    public ?string $name;
    public ?string $value;

    /**
     * Constructor.
     *
     * @param array<string, mixed> $parameters
     */
    public function __construct(array $parameters = [])
    {
        if (isset($parameters['nome'])) {
            $parameters['name'] = $parameters['nome'];
            unset($parameters['nome']);
        }

        if (isset($parameters['valor'])) {
            $parameters['value'] = $parameters['valor'];
            unset($parameters['valor']);
        }

        parent::__construct($parameters);
    }
}
