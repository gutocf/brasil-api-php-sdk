<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service;

use Gutocf\BrasilAPI\Adapter\AdapterInterface;

abstract class AbstractService
{
    protected AdapterInterface $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}
