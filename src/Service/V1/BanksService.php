<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\V1;

use Gutocf\BrasilAPI\Entity\V1\Bank;
use Gutocf\BrasilAPI\Service\AbstractService;

class BanksService extends AbstractService
{
    /**
     * Retrieve a list of banks.
     *
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @return Bank[]
     */
    public function getAll(): array
    {
        $data = $this->adapter->get('/api/banks/v1/');

        return array_map(
            function ($data) {
                return new Bank($data);
            },
            $data
        );
    }

    /**
     * Retrieve a bank by its code;
     *
     * @param  int $code Bank code
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException
     * @return Bank
     */
    public function get(int $code): Bank
    {
        $data = $this->adapter->get(sprintf('/api/banks/v1/%s', $code));

        return new Bank($data);
    }
}
