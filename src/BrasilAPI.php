<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI;

use Gutocf\BrasilAPI\Adapter\Adapter;
use Gutocf\BrasilAPI\Service\V1\BanksService;
use Gutocf\BrasilAPI\Service\V1\CepService as V1CepService;
use Gutocf\BrasilAPI\Service\V2\CepService as V2CepService;
use GuzzleHttp\Client;

/**
 * Factory for BrasilAPI services
 */
abstract class BrasilAPI
{
    /**
     * Returns a instance of V1 Cep Service.
     *
     * @return V1CepService
     */
    public static function cepV1(): V1CepService
    {
        return new V1CepService(new Adapter(new Client()));
    }

    /**
     * Returns a instance of V2 Cep Service.
     *
     * @return V2CepService
     */
    public static function cepV2(): V2CepService
    {
        return new V2CepService(new Adapter(new Client()));
    }

    /**
     * Returns a instance of banks service.
     *
     * @return BanksService
     */
    public static function banksV1(): BanksService
    {
        return new BanksService(new Adapter(new Client()));
    }
}
