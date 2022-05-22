<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\Enum;

use MyCLabs\Enum\Enum;

/**
 * @extends Enum<string>
 * @method static Service CEP()
 */
final class Service extends Enum
{
    private const CEP = 'cep';
}
