<?php

namespace Gutocf\BrasilAPI\Caster;

use DateTime;
use Spatie\DataTransferObject\Caster;

class DateTimeCaster implements Caster
{
    /**
     * @param array|mixed $value
     *
     * @return DateTime|null
     */
    public function cast(mixed $value): ?DateTime
    {
        $date = DateTime::createFromFormat('Y-m-d', $value);

        return $date ? $date : null;
    }
}
