<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1\Fipe;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Vehicle extends FlexibleDataTransferObject
{
    public ?float $valor;
    public ?string $marca;
    public ?string $modelo;
    public ?int $anoModelo;
    public ?string $combustivel;
    public ?string $codigoFipe;
    public ?string $mesReferencia;
    public ?int $tipoVeiculo;
    public ?string $siglaCombustivel;
    public ?string $dataConsulta;

    /**
     * Constructor.
     *
     * @param array<string, mixed> $parameters
     */
    public function __construct(array $parameters = [])
    {
        if (isset($parameters['valor'])) {
            $parameters['valor'] = floatval(intval(preg_replace('/\D/', '', $parameters['valor'])) / 100);
        }

        parent::__construct($parameters);
    }
}
