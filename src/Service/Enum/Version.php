<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Service\Enum;

use MyCLabs\Enum\Enum;

/**
 * @extends Enum<string>
 * @method static Version V1()
 * @method static Version V2()
 */
final class Version extends Enum
{
    private const V1 = 'v1';
    private const V2 = 'v2';
}
