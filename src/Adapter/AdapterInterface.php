<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Adapter;

use Psr\Http\Message\ResponseInterface;

interface AdapterInterface
{
    /**
     * Sends a GET request.
     *
     * @param string $path
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException;
     * @return \Psr\Http\Message\ResponseInterface;
     *
     */
    public function get(string $path): ResponseInterface;
}
