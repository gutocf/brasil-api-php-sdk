<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Adapter;

interface AdapterInterface
{
    /**
     * Sends a GET request.
     *
     * @param string $path
     * @throws \Gutocf\BrasilAPI\Exception\NotFoundException;
     * @return mixed[] Data returned by the API.
     */
    public function get(string $path): array;
}
