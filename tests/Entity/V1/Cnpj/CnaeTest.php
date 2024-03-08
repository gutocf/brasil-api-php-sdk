<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use Gutocf\BrasilAPI\Entity\V1\Cnpj\Cnae;
use PHPUnit\Framework\TestCase;

class CnaeTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/Cnpj/cnae');
        $cnae = new Cnae($data);
        $this->assertEquals($cnae->codigo, $data['codigo']);
        $this->assertEquals($cnae->descricao, $data['descricao']);
        $this->assertObjectNotHasProperty('invalid', $cnae);
    }
}
