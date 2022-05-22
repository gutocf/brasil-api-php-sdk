<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service;

use Gutocf\BrasilAPI\Entity\Cep;

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
        $response = $this->adapter->get(sprintf('/api/cep/v1/%s', $cep));
        $data = json_decode($response->getBody()->getContents(), true);

        return new Cep($data);
    }
}
