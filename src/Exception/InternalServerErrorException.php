<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Exception;

use Psr\Http\Message\ResponseInterface;

class InternalServerErrorException extends AbstractHttpException
{
    public function __construct(ResponseInterface $response)
    {
        parent::__construct($response, 500);
    }
}
