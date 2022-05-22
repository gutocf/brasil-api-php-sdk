<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\Enum;

use MyCLabs\Enum\Enum;

/**
 * @extends Enum<string>
 * @method static Service CEP_V1()
 * @method static Service CEP_V2()
 */
final class Service extends Enum
{
    private const CEP_V1 = 'cep-v1';
    private const CEP_V2 = 'cep-v2';
}
