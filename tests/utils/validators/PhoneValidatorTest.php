<?php

namespace utils\validators;

use piment\utils\validators\PhoneValidator;
use PHPUnit\Framework\TestCase;

class PhoneValidatorTest extends TestCase
{

    public function testValidate()
    {
        $phoneValidator = new PhoneValidator();
        $this->assertTrue($phoneValidator->validate("0601020304")); // nature
        $this->assertTrue($phoneValidator->validate("06-01-02-03-04")); // avec tirets
        $this->assertTrue($phoneValidator->validate("06 01 02 03 04")); // avec espaces

        $this->assertFalse($phoneValidator->validate("0601020")); // Trop court
        $this->assertFalse($phoneValidator->validate("06010203045")); // Trop long
        $this->assertFalse($phoneValidator->validate('abcd1')); // Non numérique
        $this->assertFalse($phoneValidator->validate('060102030a')); // Contient des lettres
        $this->assertFalse($phoneValidator->validate('1102030405')); // Ne commence pas par 0

    }
}
