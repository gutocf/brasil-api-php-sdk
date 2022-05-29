<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use Gutocf\BrasilAPI\Entity\V1\Ibge\Region;
use Gutocf\BrasilAPI\Entity\V1\Ibge\State;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/Ibge/state');
        $state = new State($data);
        $this->assertEquals($state->id, $data['id']);
        $this->assertEquals($state->sigla, $data['sigla']);
        $this->assertEquals($state->nome, $data['nome']);
        $this->assertInstanceOf(Region::class, $state->regiao);
        $this->assertObjectNotHasAttribute('invalid', $state);
    }
}
