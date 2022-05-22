<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Adapter;

use Gutocf\BrasilAPI\Exception\NotFoundException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class Adapter extends AbstractAdapter
{
    /**
     * @inheritDoc
     */
    public function get(string $path): array
    {
        return $this->request('GET', $path);
    }
}
