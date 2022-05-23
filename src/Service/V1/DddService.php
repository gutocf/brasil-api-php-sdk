<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\V1;

use Gutocf\BrasilAPI\Entity\V1\Ddd;
use Gutocf\BrasilAPI\Service\AbstractService;

class DddService extends AbstractService
{
    /**
     * Search for a CNPJ
     *
     * @param int $ddd Two digit DDD
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @return Ddd
     */
    public function get(int $ddd): Ddd
    {
        $data = $this->adapter->get(sprintf('/api/ddd/v1/%s', $ddd));

        return new Ddd($data);
    }
}
