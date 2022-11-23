<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\V1;

use Gutocf\BrasilAPI\Entity\V1\Holiday;
use Gutocf\BrasilAPI\Service\AbstractService;

class HolidaysService extends AbstractService
{
    /**
     * Retrieve a list of holidays for a given year.
     *
     * @param  int $year The year to retrieve holidays.
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException
     * @return Holiday[] Holidays list
     */
    public function getByYear(int $year): array
    {
        $data = $this->adapter->get(sprintf('/api/feriados/v1/%d', $year));

        return array_map(
            function ($data) {
                return new Holiday($data);
            },
            $data
        );
    }
}
