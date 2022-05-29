<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Adapter;

use Gutocf\BrasilAPI\Adapter\AbstractAdapter;
use Gutocf\BrasilAPI\Exception\BadRequestException;
use Gutocf\BrasilAPI\Exception\InternalServerErrorException;
use Gutocf\BrasilAPI\Exception\NotFoundException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;

class AbstractAdapterTest extends TestCase
{
    public function testGetUri(): void
    {
        $adapter = $this->getMockForAbstractClass(AbstractAdapter::class, [new Client()]);
        $reflection = new \ReflectionClass(get_class($adapter));
        $method = $reflection->getMethod('getUri');
        $method->setAccessible(true);
        /** @var \GuzzleHttp\Psr7\Uri $uri */
        $uri = $method->invoke($adapter, '/path/to/resource', [
            'foo' => 'bar',
            'baz' => 'qux',
            'foobar' => '',
            'quux' => null
        ]);
        $this->assertInstanceOf(Uri::class, $uri);
        $this->assertEquals('https://brasilapi.com.br/path/to/resource?foo=bar&baz=qux&foobar=', $uri->__toString());
    }

    public function testHandleErrors(): void
    {
        $adapter = $this->getMockForAbstractClass(AbstractAdapter::class, [new Client()]);

        $reflection = new \ReflectionClass(get_class($adapter));
        $method = $reflection->getMethod('handleErrors');
        $method->setAccessible(true);

        $this->expectException(BadRequestException::class);
        $body = json_encode(['name' => 'Bad Request']);
        $method->invoke($adapter, new Response(400, [], $body));

        $this->expectException(NotFoundException::class);
        $body = json_encode(['name' => 'Not Found']);
        $method->invoke($adapter, new Response(404, [], $body));

        $this->expectException(InternalServerErrorException::class);
        $body = json_encode(['name' => 'Internal Server Error']);
        $method->invoke($adapter, new Response(500, [], $body));
    }
}
