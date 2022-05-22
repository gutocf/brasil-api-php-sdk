<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\V1;

use Gutocf\BrasilAPI\Entity\V1\Cep;
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
        $data = $this->adapter->get(sprintf('/api/cep/v1/%s', $cep));

        return new Cep($data);
    }
}
