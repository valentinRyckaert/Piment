<?php

namespace utils\validators;

use piment\utils\validators\CPValidator;
use PHPUnit\Framework\TestCase;

class CPValidatorTest extends TestCase
{

    public function testValidate()
    {
        $cpValidator = new CPValidator();
        $this->assertTrue($cpValidator->validate("75000"));
        $this->assertTrue($cpValidator->validate("75001"));
        $this->assertTrue($cpValidator->validate("75002"));

        $this->assertFalse($cpValidator->validate("7500")); // Trop court
        $this->assertFalse($cpValidator->validate("750000")); // Trop long
        $this->assertFalse($cpValidator->validate('abcd1')); // Non numérique
        $this->assertFalse($cpValidator->validate('1234')); // Trop court
        $this->assertFalse($cpValidator->validate('7500a')); // Contient des lettres
        $this->assertFalse($cpValidator->validate('99000')); // Hors plage
    }
}
