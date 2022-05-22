<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Tests\Entity;

use Gutocf\BrasilAPI\Entity\V1\Bank;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{
    public function testProperties(): void
    {
        $data = [
            'ispb' => '00000000',
            'name' => 'BCO DO BRASIL S.A.',
            'code' => 1,
            'fullName' => 'Banco do Brasil S.A.',
            'invalid' => 'invalid',
        ];
        $bank = new Bank($data);
        $this->assertEquals($bank->ispb, $data['ispb']);
        $this->assertEquals($bank->name, $data['name']);
        $this->assertEquals($bank->code, $data['code']);
        $this->assertEquals($bank->fullName, $data['fullName']);
        $this->assertObjectNotHasAttribute('invalid', $bank);
    }
}
