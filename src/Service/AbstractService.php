<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service;

use Gutocf\BrasilAPI\Adapter\AdapterInterface;

abstract class AbstractService
{
    public function __construct(protected AdapterInterface $adapter)
    {
    }
}
