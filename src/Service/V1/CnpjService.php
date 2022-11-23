<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\V1;

use Gutocf\BrasilAPI\Entity\V1\Cnpj;
use Gutocf\BrasilAPI\Service\AbstractService;

class CnpjService extends AbstractService
{
    /**
     * Search for a CNPJ
     *
     * @param  string $cnpj
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException
     * @return Cnpj
     */
    public function get(string $cnpj): Cnpj
    {
        $data = $this->adapter->get(sprintf('/api/cnpj/v1/%s', $cnpj));

        return new Cnpj($data);
    }
}
