<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1;

use DateTime;
use Gutocf\BrasilAPI\Caster\DateTimeCaster;
use Gutocf\BrasilAPI\Entity\V1\Cnpj\Cnae;
use Gutocf\BrasilAPI\Entity\V1\Cnpj\Qsa;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\DefaultCast;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

#[DefaultCast(DateTime::class, DateTimeCaster::class)]
class Cnpj extends DataTransferObject
{
    public ?string $uf;
    public ?string $cep;
    public ?string $cnpj;
    public ?string $pais;
    public ?string $porte;
    public ?string $bairro;
    public ?string $numero;
    public ?string $ddd_fax;
    public ?string $municipio;
    public ?string $logradouro;
    public ?int $cnae_fiscal;
    public ?string $codigo_pais;
    public ?string $complemento;
    public ?int $codigo_porte;
    public ?string $razao_social;
    public ?string $nome_fantasia;
    public ?int $capital_social;
    public ?string $ddd_telefone_1;
    public ?string $ddd_telefone_2;
    public ?bool $opcao_pelo_mei;
    public ?string $descricao_porte;
    public ?int $codigio_municipio;
    public ?string $natureza_juridica;
    public ?string $situacao_especial;
    public ?bool $opcao_pelo_simples;
    public ?int $situacao_cadastral;
    public ?DateTime $data_opcao_pelo_mei;
    public ?DateTime $data_exclusao_do_mei;
    public ?string $cnae_fiscal_descricao;
    public ?DateTime $data_inicio_atividade;
    public ?DateTime $data_situacao_especial;
    public ?DateTime $data_opcao_pelo_simples;
    public ?DateTime $data_situacao_cadastral;
    public ?string $nome_cidade_no_exterior;
    public ?int $codigo_natureza_juridica;
    public ?DateTime $data_exclusao_do_simples;
    public ?int $motivo_situacao_cadastral;
    public ?string $ente_federativo_responsavel;
    public ?int $identificador_matriz_filial;
    public ?int $qualificacao_do_responsavel;
    public ?string $descricao_situacao_cadastral;
    public ?string $descricao_tipo_de_logradouro;
    public ?string $descricao_motivo_situacao_cadastral;
    /** @var \Gutocf\BrasilAPI\Entity\V1\Cnpj\Cnae[] */
    #[CastWith(ArrayCaster::class, Cnae::class)]
    public ?array $cnaes_secundarios;
    /** @var \Gutocf\BrasilAPI\Entity\V1\Cnpj\Qsa[] */
    #[CastWith(ArrayCaster::class, Qsa::class)]
    public ?array $qsa;
}
