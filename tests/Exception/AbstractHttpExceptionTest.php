<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Exception;

use Gutocf\BrasilAPI\Exception\AbstractHttpException;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class AbstractHttpExceptionTest extends TestCase
{
    public function testGetOriginalMessage(): void
    {
        $response = new Response(404, [], '{"name":"Not Found"}');
        $exception = $this->getMockForAbstractClass(AbstractHttpException::class, [
            $response, 404
        ]);
        $originalMessage = $exception->getOriginalMessage();
        $this->assertEquals('Not Found', $originalMessage->name);
    }
}
