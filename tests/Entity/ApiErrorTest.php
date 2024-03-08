<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests;

use Gutocf\BrasilAPI\Entity\ApiError;
use PHPUnit\Framework\TestCase;

class ApiErrorTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/api-error');
        $apiError = new ApiError($data);
        $this->assertEquals($apiError->message, $data['message']);
        $this->assertEquals($apiError->name, $data['name']);
        $this->assertEquals($apiError->type, $data['type']);
        $this->assertObjectNotHasProperty('invalid', $apiError);
    }
}
