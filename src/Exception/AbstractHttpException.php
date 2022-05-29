<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Exception;

use Exception;
use Gutocf\BrasilAPI\Entity\ApiError;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractHttpException extends Exception
{
    private ApiError $originalMessage;

    public function __construct(ResponseInterface $response, int $code = 500)
    {
        $body = $response->getBody()->getContents();
        $body = empty($body) ?
            '{"error":"Unable to request from Brasil API"}' :
            $body;
        $data = json_decode($body, true);
        $this->originalMessage = new ApiError($data);
        $message = $this->originalMessage->name ?? 'Unknown error';

        parent::__construct($message, $code);
    }

    /**
     * Returns original error message from API.
     *
     * @return \Gutocf\BrasilAPI\Entity\ApiError
     */
    final public function getOriginalMessage(): ApiError
    {
        return $this->originalMessage;
    }
}
