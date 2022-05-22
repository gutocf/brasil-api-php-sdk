<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service;

use Gutocf\BrasilAPI\Adapter\Adapter;
use Gutocf\BrasilAPI\Adapter\AdapterInterface;
use Gutocf\BrasilAPI\Service\Enum\Service;
use Gutocf\BrasilAPI\Service\V1\CepService as V1CepService;
use Gutocf\BrasilAPI\Service\V2\CepService as V2CepService;
use GuzzleHttp\Client;
use RuntimeException;

abstract class ServiceFactory
{
    private static ?AdapterInterface $adapter = null;

    public static function get(Service $service): ServiceInterface
    {
        switch ($service) {
            case Service::CEP_V1():
                return new V1CepService(self::getAdapter());

            case Service::CEP_V2():
                return new V2CepService(self::getAdapter());
        }

        throw new RuntimeException('Service not found');
    }

    private static function getAdapter(): AdapterInterface
    {
        if (is_null(self::$adapter)) {
            self::$adapter = new Adapter(new Client());
        }

        return self::$adapter;
    }
}
