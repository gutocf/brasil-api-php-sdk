<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\V2;

use Gutocf\BrasilAPI\Entity\V2\Cep;
use Gutocf\BrasilAPI\Service\AbstractService;

class CepService extends AbstractService
{
    /**
     * Search for a CEP.
     *
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException
     *
     * @param string $cep CEP
     * @return Cep
     */
    public function get(string $cep): Cep
    {
        $data = $this->adapter->get(sprintf('/api/cep/v2/%s', $cep));

        return new Cep($data);
    }
}
