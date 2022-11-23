<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1\Fipe\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method  static VehicleType TRUCKS()
 * @method  static VehicleType CARS()
 * @method  static VehicleType MOTORCYCLES()
 * @extends Enum<string>
 */
final class VehicleType extends Enum
{
    private const TRUCKS = 'caminhoes';
    private const CARS = 'carros';
    private const MOTORCYCLES = 'motos';
}
