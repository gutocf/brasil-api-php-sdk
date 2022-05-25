<?php

namespace Gutocf\BrasilAPI\Tests\Entity\V1\Fipe;

use Gutocf\BrasilAPI\Entity\V1\Fipe\ReferenceTable;
use PHPUnit\Framework\TestCase;

class ReferenceTableTest extends TestCase
{
    public function testProperties(): void
    {
        $data = loadFixture('Entity/V1/Fipe/reference-table');
        $referenceTable = new ReferenceTable($data);
        $this->assertEquals($referenceTable->codigo, $data['codigo']);
        $this->assertEquals($referenceTable->mes, $data['mes']);
        $this->assertObjectNotHasAttribute('invalid', $referenceTable);
    }
}
