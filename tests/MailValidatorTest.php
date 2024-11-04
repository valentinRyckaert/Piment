<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use piment\utils\validators\MailValidator;
use piment\utils\validators\PasswordValidator;

class MailValidatorTest extends TestCase
{
    private $mailValidator;

    protected function setUp(): void {
        $this->mailValidator = new MailValidator();
    }

    public function testValidate()
    {
        $this->assertTrue($this->mailValidator->validate('exemple@domaine.com'));
        $this->assertTrue($this->mailValidator->validate('prenom.nom@domaine.fr'));
        $this->assertTrue($this->mailValidator->validate('user+tag@domaine.co.uk'));
        $this->assertTrue($this->mailValidator->validate('test_email@domaine.org'));
    }

    public function testInvalidEmailWithConsecutiveDots()
    {
        $this->assertFalse($this->mailValidator->validate('exemple@domaine..com')); // Deux points consécutifs
    }

    public function testInvalidEmailWithoutLocalPart()
    {
        $this->assertFalse($this->mailValidator->validate('@domaine.com')); // Pas de partie locale
    }

    public function testInvalidEmailWithoutDomain()
    {
        $this->assertFalse($this->mailValidator->validate('exemple@.com')); // Pas de nom de domaine
    }

    public function testInvalidEmailWithoutTLD()
    {
        $this->assertFalse($this->mailValidator->validate('exemple@domaine')); // Manque le TLD
    }

    public function testInvalidEmailWithShortTLD()
    {
        $this->assertFalse($this->mailValidator->validate('exemple@domaine.c')); // TLD trop court
    }

    public function testInvalidEmailWithInvalidCharacter()
    {
        $this->assertFalse($this->mailValidator->validate('exemple@domaine,com')); // Caractère invalide
    }

    public function testInvalidEmailWithMultipleAtSymbols()
    {
        $this->assertFalse($this->mailValidator->validate('exemple@domaine.c@om')); // Deux @
    }
}
