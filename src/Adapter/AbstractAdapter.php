<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Adapter;

use Gutocf\BrasilAPI\Exception\InternalServerErrorException;
use Gutocf\BrasilAPI\Exception\NotFoundException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

abstract class AbstractAdapter implements AdapterInterface
{
    private const SCHEME = 'https';

    private const HOST = 'brasilapi.com.br';

    private const DEFAULT_OPTIONS = [
        'http_errors' => false,
        'headers' => [
            'Content-Type' => 'application/json',
        ]
    ];

    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Performs a request to the API.
     *
     * @param string $method HTTP method
     * @param string $path Path to the resource
     * @return mixed[]
     */
    protected function request(string $method, string $path): array
    {
        $uri = $this->getUri($path);
        $response = $this->client->request($method, $uri, self::DEFAULT_OPTIONS);
        $this->handleErrors($response);

        return $this->parseResponseBody($response);
    }

    /**
     * Handles request errors.
     *
     * @param ResponseInterface $response
     * @throws NotFoundException
     * @return void
     */
    private function handleErrors(ResponseInterface $response): void
    {
        if ($response->getStatusCode() === 404) {
            throw new NotFoundException($response);
        }

        if ($response->getStatusCode() === 500) {
            throw new InternalServerErrorException($response);
        }
    }

    /**
     * Parses the response body.
     *
     * @return mixed[]
     */
    private function parseResponseBody(ResponseInterface $response): array
    {
        $data = json_decode($response->getBody()->getContents(), true);
        $data = is_array($data) ? $data : [$data];

        return $data;
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
