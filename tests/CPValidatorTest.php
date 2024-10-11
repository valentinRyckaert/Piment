<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use piment\utils\validators\CPValidator;

class CPValidatorTest extends TestCase
{

    public function testValidate()
    {
        $cpValidator = new CPValidator();
        $this->assertTrue($cpValidator->validate("75000"));
        $this->assertTrue($cpValidator->validate("75001"));
        $this->assertTrue($cpValidator->validate("75002"));
    }

    public function testTooShort()
    {
        $cpValidator = new CPValidator();
        $this->assertFalse($cpValidator->validate("7500")); // Trop court
    }

    public function testTooLong()
    {
        $cpValidator = new CPValidator();
        $this->assertFalse($cpValidator->validate("750000")); // Trop long
    }

    public function testNonNumeric()
    {
        $cpValidator = new CPValidator();
        $this->assertFalse($cpValidator->validate('abcd1')); // Non numérique
    }

    public function testAnotherTooShort()
    {
        $cpValidator = new CPValidator();
        $this->assertFalse($cpValidator->validate('1234')); // Trop court
    }

    public function testContainsLetters()
    {
        $cpValidator = new CPValidator();
        $this->assertFalse($cpValidator->validate('7500a')); // Contient des lettres
    }

    public function testOutOfRange()
    {
        $cpValidator = new CPValidator();
        $this->assertFalse($cpValidator->validate('99000')); // Hors plage
    }


}
