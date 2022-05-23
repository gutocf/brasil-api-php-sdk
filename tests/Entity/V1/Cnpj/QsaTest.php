<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use Gutocf\BrasilAPI\Entity\V1\Cnpj\Qsa;
use PHPUnit\Framework\TestCase;

class QsaTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/Cnpj/qsa');
        $qsa = new Qsa($data);
        $this->assertEquals($qsa->pais, $data['pais']);
        $this->assertEquals($qsa->nome_socio, $data['nome_socio']);
        $this->assertEquals($qsa->codigo_pais, $data['codigo_pais']);
        $this->assertEquals($qsa->faixa_etaria, $data['faixa_etaria']);
        $this->assertEquals($qsa->cnpj_cpf_do_socio, $data['cnpj_cpf_do_socio']);
        $this->assertEquals($qsa->qualificacao_socio, $data['qualificacao_socio']);
        $this->assertEquals($qsa->codigo_faixa_etaria, $data['codigo_faixa_etaria']);
        $this->assertEquals($qsa->data_entrada_sociedade, $data['data_entrada_sociedade']);
        $this->assertEquals($qsa->identificador_de_socio, $data['identificador_de_socio']);
        $this->assertEquals($qsa->cpf_representante_legal, $data['cpf_representante_legal']);
        $this->assertEquals($qsa->nome_representante_legal, $data['nome_representante_legal']);
        $this->assertEquals($qsa->codigo_qualificacao_socio, $data['codigo_qualificacao_socio']);
        $this->assertEquals($qsa->qualificacao_representante_legal, $data['qualificacao_representante_legal']);
        $this->assertEquals($qsa->codigo_qualificacao_representante_legal, $data['codigo_qualificacao_representante_legal']);
        $this->assertObjectNotHasAttribute('invalid', $qsa);
    }
}
