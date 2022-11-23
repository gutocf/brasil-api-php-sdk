<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\V1;

use Gutocf\BrasilAPI\Entity\V1\Fipe\Brand;
use Gutocf\BrasilAPI\Entity\V1\Fipe\Enum\VehicleType;
use Gutocf\BrasilAPI\Entity\V1\Fipe\ReferenceTable;
use Gutocf\BrasilAPI\Entity\V1\Fipe\Vehicle;
use Gutocf\BrasilAPI\Service\AbstractService;

class FipeService extends AbstractService
{
    /**
     * Retrieve price for a vehicle.
     *
     * @param  string   $code             Fipe code of the vehicle
     * @param  int|null $referenceTableId The reference table id
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @throws \Gutocf\BrasilAPI\Exception\BadRequestException
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException
     * @return \Gutocf\BrasilAPI\Entity\V1\Fipe\Vehicle[]
     */
    public function getAllVehicleByCode(string $code, int $referenceTableId = null): array
    {
        $path = sprintf('/api/fipe/preco/v1/%s', $code);
        $queryParams = ['tabela_referencia' => $referenceTableId];
        $data = $this->adapter->get($path, $queryParams);

        return array_map(
            function ($data) {
                return new Vehicle($data);
            },
            $data
        );
    }

    /**
     * Retrieve price for a vehicle.
     *
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @return \Gutocf\BrasilAPI\Entity\V1\Fipe\ReferenceTable[]
     */
    public function getAllReferenceTables(): array
    {
        $data = $this->adapter->get('/api/fipe/tabelas/v1');

        return array_map(
            function ($data) {
                return new ReferenceTable($data);
            },
            $data
        );
    }

    /**
     * Retrieve a list of holidays for a given year.
     *
     * @param  \Gutocf\BrasilAPI\Entity\V1\Fipe\Enum\VehicleType|null $vehicleType      The vehicle type
     * @param  int|null                                               $referenceTableId The reference table id
     * @throws \Gutocf\BrasilAPI\Exception\BadRequestException
     * @throws \Gutocf\BrasilAPI\Exception\InternalServerErrorException
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException
     * @return \Gutocf\BrasilAPI\Entity\V1\Fipe\Brand[] Vehicle brands.
     */
    public function getAllBrandsByType(?VehicleType $vehicleType = null, ?int $referenceTableId = null): array
    {
        $vehicleTypeParam = $vehicleType ? $vehicleType->getValue() : null;
        $path = sprintf('/api/fipe/marcas/v1/%s', $vehicleTypeParam);
        $queryParams = ['tabela_referencia' => $referenceTableId];
        $data = $this->adapter->get($path, $queryParams);

        return array_map(
            function ($data) {
                return new Brand($data);
            },
            $data
        );
    }
}
