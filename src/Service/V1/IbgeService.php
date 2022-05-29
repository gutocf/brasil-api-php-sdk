<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\V1;

use Gutocf\BrasilAPI\Entity\V1\Ibge\City;
use Gutocf\BrasilAPI\Entity\V1\Ibge\State;
use Gutocf\BrasilAPI\Service\AbstractService;

class IbgeService extends AbstractService
{
    /**
     * Returns the list of cities by state.
     *
     * @param string $siglaUf The state initials
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException
     * @return array<Gutocf\BrasilAPI\Entity\V1\Ibge\City>
     */
    public function getCitiesByState(string $siglaUf): array
    {
        $path = sprintf('/api/ibge/municipios/v1/%s', $siglaUf);
        $data = $this->adapter->get($path);

        return array_map(function (array $data) {
            return new City($data);
        }, $data);
    }

    /**
     * Returns the list of states.
     *
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException
     * @return array<\Gutocf\BrasilAPI\Entity\V1\Ibge\State>
     */
    public function getAllStates(): array
    {
        $data = $this->adapter->get('/api/ibge/uf/v1/');

        return array_map(function (array $data) {
            return new State($data);
        }, $data);
    }

    /**
     * Gets information about a state by its initials.
     *
     * @param int|string $siglaUf Code or initials of the state
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException
     * @return \Gutocf\BrasilAPI\Entity\V1\Ibge\State
     */
    public function getState(int|string $code): State
    {
        $path = sprintf('/api/ibge/uf/v1/%s', $code);
        $data = $this->adapter->get($path);

        return new State($data);
    }
}
