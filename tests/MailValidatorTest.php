<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use piment\utils\validators\MailValidator;

class MailValidatorTest extends TestCase
{
    private $mailValidator;

        public function testValidate()
        {
            $mailValidator = new MailValidator();
            $this->assertTrue($mailValidator->validate('exemple@domaine.com'));
            $this->assertTrue($mailValidator->validate('prenom.nom@domaine.fr'));
            $this->assertTrue($mailValidator->validate('user+tag@domaine.co.uk'));
            $this->assertTrue($mailValidator->validate('test_email@domaine.org'));
        }

    public function testInvalidEmailWithConsecutiveDots()
    {
        $mailValidator = new MailValidator();
        $this->assertFalse($mailValidator->validate('exemple@domaine..com')); // Deux points consécutifs
    }

    public function testInvalidEmailWithoutLocalPart()
    {
        $mailValidator = new MailValidator();
        $this->assertFalse($mailValidator->validate('@domaine.com')); // Pas de partie locale
    }

    public function testInvalidEmailWithoutDomain()
    {
        $mailValidator = new MailValidator();
        $this->assertFalse($mailValidator->validate('exemple@.com')); // Pas de nom de domaine
    }

    public function testInvalidEmailWithoutTLD()
    {
        $mailValidator = new MailValidator();
        $this->assertFalse($mailValidator->validate('exemple@domaine')); // Manque le TLD
    }

    public function testInvalidEmailWithShortTLD()
    {
        $mailValidator = new MailValidator();
        $this->assertFalse($mailValidator->validate('exemple@domaine.c')); // TLD trop court
    }

    public function testInvalidEmailWithInvalidCharacter()
    {
        $mailValidator = new MailValidator();
        $this->assertFalse($mailValidator->validate('exemple@domaine,com')); // Caractère invalide
    }

    public function testInvalidEmailWithMultipleAtSymbols()
    {
        $mailValidator = new MailValidator();
        $this->assertFalse($mailValidator->validate('exemple@domaine.c@om')); // Deux @
    }
}
