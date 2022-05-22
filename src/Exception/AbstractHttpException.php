<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Exception;

use Exception;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractHttpException extends Exception
{
    public function __construct(ResponseInterface $response, int $code = 500)
    {
        $data = json_decode($response->getBody()->getContents(), true);
        $message = $data['message'] ?? 'HTTP exception';

        parent::__construct($message, $code);
    }
}
