<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use DateTime;
use Gutocf\BrasilAPI\Entity\V1\Cnpj;
use Gutocf\BrasilAPI\Entity\V1\Cnpj\Cnae;
use Gutocf\BrasilAPI\Entity\V1\Cnpj\Qsa;
use PHPUnit\Framework\TestCase;

class CnpjTest extends TestCase
{

    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/cnpj');
        $cnpj = new Cnpj($data);
        $this->assertEquals($cnpj->bairro, $data['bairro']);
        $this->assertEquals($cnpj->capital_social, $data['capital_social']);
        $this->assertEquals($cnpj->cep, $data['cep']);
        $this->assertEquals($cnpj->cnae_fiscal_descricao, $data['cnae_fiscal_descricao']);
        $this->assertEquals($cnpj->cnae_fiscal, $data['cnae_fiscal']);
        $this->assertEquals($cnpj->cnpj, $data['cnpj']);
        $this->assertEquals($cnpj->codigio_municipio, $data['codigio_municipio']);
        $this->assertEquals($cnpj->codigo_natureza_juridica, $data['codigo_natureza_juridica']);
        $this->assertEquals($cnpj->codigo_pais, $data['codigo_pais']);
        $this->assertEquals($cnpj->codigo_porte, $data['codigo_porte']);
        $this->assertEquals($cnpj->complemento, $data['complemento']);
        $this->assertEquals($cnpj->data_opcao_pelo_mei, $data['data_opcao_pelo_mei']);
        $this->assertEquals($cnpj->ddd_fax, $data['ddd_fax']);
        $this->assertEquals($cnpj->ddd_telefone_1, $data['ddd_telefone_1']);
        $this->assertEquals($cnpj->ddd_telefone_2, $data['ddd_telefone_2']);
        $this->assertEquals($cnpj->descricao_motivo_situacao_cadastral, $data['descricao_motivo_situacao_cadastral']);
        $this->assertEquals($cnpj->descricao_porte, $data['descricao_porte']);
        $this->assertEquals($cnpj->descricao_situacao_cadastral, $data['descricao_situacao_cadastral']);
        $this->assertEquals($cnpj->descricao_tipo_de_logradouro, $data['descricao_tipo_de_logradouro']);
        $this->assertEquals($cnpj->ente_federativo_responsavel, $data['ente_federativo_responsavel']);
        $this->assertEquals($cnpj->identificador_matriz_filial, $data['identificador_matriz_filial']);
        $this->assertEquals($cnpj->logradouro, $data['logradouro']);
        $this->assertEquals($cnpj->motivo_situacao_cadastral, $data['motivo_situacao_cadastral']);
        $this->assertEquals($cnpj->municipio, $data['municipio']);
        $this->assertEquals($cnpj->natureza_juridica, $data['natureza_juridica']);
        $this->assertEquals($cnpj->nome_cidade_no_exterior, $data['nome_cidade_no_exterior']);
        $this->assertEquals($cnpj->nome_fantasia, $data['nome_fantasia']);
        $this->assertEquals($cnpj->numero, $data['numero']);
        $this->assertEquals($cnpj->opcao_pelo_mei, $data['opcao_pelo_mei']);
        $this->assertEquals($cnpj->opcao_pelo_simples, $data['opcao_pelo_simples']);
        $this->assertEquals($cnpj->pais, $data['pais']);
        $this->assertEquals($cnpj->porte, $data['porte']);
        $this->assertEquals($cnpj->qualificacao_do_responsavel, $data['qualificacao_do_responsavel']);
        $this->assertEquals($cnpj->razao_social, $data['razao_social']);
        $this->assertEquals($cnpj->situacao_cadastral, $data['situacao_cadastral']);
        $this->assertEquals($cnpj->situacao_especial, $data['situacao_especial']);
        $this->assertEquals($cnpj->uf, $data['uf']);
        $this->assertInstanceOf(Cnae::class, $cnpj->cnaes_secundarios[0]);
        $this->assertInstanceOf(DateTime::class, $cnpj->data_inicio_atividade);
        $this->assertInstanceOf(DateTime::class, $cnpj->data_opcao_pelo_simples);
        $this->assertInstanceOf(DateTime::class, $cnpj->data_situacao_cadastral);
        $this->assertInstanceOf(Qsa::class, $cnpj->qsa[0]);
        $this->assertIsArray($cnpj->cnaes_secundarios);
        $this->assertIsArray($cnpj->qsa);
        $this->assertNull($cnpj->data_exclusao_do_mei);
        $this->assertNull($cnpj->data_exclusao_do_simples);
        $this->assertNull($cnpj->data_situacao_especial);
        $this->assertObjectNotHasAttribute('invalid', $cnpj);
    }
}
