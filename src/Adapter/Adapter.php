<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Adapter;

use Gutocf\BrasilAPI\Exception\NotFoundException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class Adapter implements AdapterInterface
{
    protected const SCHEME = 'https';

    protected const HOST = 'brasilapi.com.br';

    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @inheritDoc
     */
    public function get(string $path): ResponseInterface
    {
        return $this->request('GET', $path);
    }

    private function request(string $method, string $path): ResponseInterface
    {
        $uri = $this->getUri($path);
        $options = [
            'http_errors' => false,
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ];

        $response = $this->client->request($method, $uri, $options);

        $this->handleErrors($response);

        return $response;
    }

    private function handleErrors(ResponseInterface $response): void
    {
        if ($response->getStatusCode() === 404) {
            throw new NotFoundException($response);
        }
    }

    /**
     * Creates a URI from a path.
     *
     * @param string $path
     * @return UriInterface
     */
    private function getUri(string $path): UriInterface
    {
        return (new Uri())
            ->withScheme(self::SCHEME)
            ->withHost(self::HOST)
            ->withPath($path);
    }
}
