<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V2\Cep;

use Spatie\DataTransferObject\FieldValidator;
use Spatie\DataTransferObject\FlexibleDataTransferObject;
use Spatie\DataTransferObject\ValueCaster;

class Coordinates extends FlexibleDataTransferObject
{
    public ?float $latitude;
    public ?float $longitude;

    /**
     * @param \Spatie\DataTransferObject\ValueCaster $valueCaster
     * @param \Spatie\DataTransferObject\FieldValidator $fieldValidator
     * @param mixed $value
     *
     * @return mixed
     */
    protected function castValue(ValueCaster $valueCaster, FieldValidator $fieldValidator, $value)
    {
        $value = $value ? floatval($value) : null;

        return parent::castValue($valueCaster, $fieldValidator, $value);
    }
}
