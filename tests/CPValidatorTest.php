<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use piment\utils\validators\CPValidator;
use piment\utils\validators\MailValidator;

class CPValidatorTest extends TestCase
{

    private $cpValidator;

    protected function setUp(): void {
        $this->cpValidator = new CPValidator();
    }

    public function testValidate()
    {
        $this->assertTrue($this->cpValidator->validate("75000"));
        $this->assertTrue($this->cpValidator->validate("75001"));
        $this->assertTrue($this->cpValidator->validate("75002"));
    }

    public function testTooShort()
    {
        $this->assertFalse($this->cpValidator->validate("7500")); // Trop court
    }

    public function testTooLong()
    {
        $this->assertFalse($this->cpValidator->validate("750000")); // Trop long
    }

    public function testNonNumeric()
    {
        $this->assertFalse($this->cpValidator->validate('abcd1')); // Non numérique
    }

    public function testAnotherTooShort()
    {
        $this->assertFalse($this->cpValidator->validate('1234')); // Trop court
    }

    public function testContainsLetters()
    {
        $this->assertFalse($this->cpValidator->validate('7500a')); // Contient des lettres
    }

    public function testOutOfRange()
    {
        $this->assertFalse($this->cpValidator->validate('99000')); // Hors plage
    }


}
