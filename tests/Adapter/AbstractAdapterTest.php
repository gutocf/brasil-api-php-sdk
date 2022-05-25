<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Adapter;

use Gutocf\BrasilAPI\Adapter\AbstractAdapter;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;

class AbstractAdapterTest extends TestCase
{
    private AbstractAdapter $adapter;

    public function setUp(): void
    {
        $this->adapter = $this->getMockForAbstractClass(AbstractAdapter::class, [new Client()]);
    }

    public function testGetUri(): void
    {
        $reflection = new \ReflectionClass(get_class($this->adapter));
        $method = $reflection->getMethod('getUri');
        $method->setAccessible(true);
        /** @var \GuzzleHttp\Psr7\Uri $uri */
        $uri = $method->invoke($this->adapter, '/path/to/resource', [
            'foo' => 'bar',
            'baz' => 'qux',
            'foobar' => '',
            'quux' => null
        ]);
        $this->assertInstanceOf(Uri::class, $uri);
        $this->assertEquals('https://brasilapi.com.br/path/to/resource?foo=bar&baz=qux&foobar=', $uri->__toString());
    }
}
