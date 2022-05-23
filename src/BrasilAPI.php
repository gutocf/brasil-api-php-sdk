<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI;

use Gutocf\BrasilAPI\Adapter\Adapter;
use Gutocf\BrasilAPI\Adapter\AdapterInterface;
use Gutocf\BrasilAPI\Service\V1\BanksService as V1BanksService;
use Gutocf\BrasilAPI\Service\V1\CepService as V1CepService;
use Gutocf\BrasilAPI\Service\V1\CnpjService as V1CnpjService;
use Gutocf\BrasilAPI\Service\V1\DddService as V1DddService;
use Gutocf\BrasilAPI\Service\V1\HolidaysService as V1HolidayService;
use Gutocf\BrasilAPI\Service\V2\CepService as V2CepService;
use GuzzleHttp\Client;

class BrasilAPI
{
    private AdapterInterface $Adapter;

    public function __construct()
    {
        $this->Adapter = new Adapter(new Client());
    }

    /**
     * Returns a instance of V1 Cep Service.
     *
     * @return \Gutocf\BrasilAPI\Service\V1\CepService
     */
    public function cepV1(): V1CepService
    {
        return new V1CepService($this->Adapter);
    }

    /**
     * Returns a instance of V2 Cep Service.
     *
     * @return \Gutocf\BrasilAPI\Service\V2\CepService
     */
    public function cepV2(): V2CepService
    {
        return new V2CepService($this->Adapter);
    }

    /**
     * Returns a instance of banks service.
     *
     * @return \Gutocf\BrasilAPI\Service\V1\BanksService
     */
    public function banksV1(): V1BanksService
    {
        return new V1BanksService($this->Adapter);
    }

    /**
     * Returns a instance of holidays service.
     *
     * @return \Gutocf\BrasilAPI\Service\V1\HolidaysService
     */
    public function holidaysV1(): V1HolidayService
    {
        return new V1HolidayService($this->Adapter);
    }

    /**
     * Returns a instance of holidays service.
     *
     * @return \Gutocf\BrasilAPI\Service\V1\CnpjService
     */
    public function cnpjV1(): V1CnpjService
    {
        return new V1CnpjService($this->Adapter);
    }

    /**
     * Returns a instance of ddd service.
     *
     * @return \Gutocf\BrasilAPI\Service\V1\DddService
     */
    public function dddV1(): V1DddService
    {
        return new V1DddService($this->Adapter);
    }
}
