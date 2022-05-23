<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1\Cnpj;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Qsa extends FlexibleDataTransferObject
{
    public ?string $pais;
    public ?string $nome_socio;
    public ?string $codigo_pais;
    public ?string $faixa_etaria;
    public ?string $cnpj_cpf_do_socio;
    public ?string $qualificacao_socio;
    public ?int $codigo_faixa_etaria;
    public ?string $data_entrada_sociedade;
    public ?int $identificador_de_socio;
    public ?string $cpf_representante_legal;
    public ?string $nome_representante_legal;
    public ?int $codigo_qualificacao_socio;
    public ?string $qualificacao_representante_legal;
    public ?int $codigo_qualificacao_representante_legal;
}
