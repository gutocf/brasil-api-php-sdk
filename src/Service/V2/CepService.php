<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\V2;

use Gutocf\BrasilAPI\Entity\V2\Cep;
use Gutocf\BrasilAPI\Service\AbstractService;

class CepService extends AbstractService
{
    /**
     * Search for a Cep.
     *
     * @param string $cep
     * @return Cep
     */
    public function get(string $cep): Cep
    {
        $response = $this->adapter->get(sprintf('/api/cep/v2/%s', $cep));
        $data = json_decode($response->getBody()->getContents(), true);

        return new Cep($data);
    }
}
