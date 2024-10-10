<?php

namespace tests;
use PHPUnit\Framework\Attributes\Test;
use piment\utils\validators\PhoneValidator;
use PHPUnit\Framework\TestCase;

class PhoneValidatorTest extends TestCase
{
    private $validator;

    public static function setUpBeforeClass(): void
    {
        fwrite(STDOUT, "\nPHONE_VALIDATOR TESTS BEGIN\n");
    }

    protected function setUp(): void {
        $this->validator = new PhoneValidator();
    }

    #[Test]
    public function testValidPhoneNumber() {
        $this->assertTrue($this->validator->validate('01 23 45 67 89'));
        $this->assertTrue($this->validator->validate('02 34 56 78 90'));
        $this->assertTrue($this->validator->validate('09 87 65 43 21'));
    }

    #[Test]
    public function testInvalidPhoneNumberStartsWith08() {
        $this->assertFalse($this->validator->validate('08 12 34 56 78'));
    }

    #[Test]
    public function testInvalidPhoneNumberStartsWith0() {
        $this->assertFalse($this->validator->validate('00 12 34 56 78'));
    }

    #[Test]
    public function testInvalidPhoneNumberTooShort() {
        $this->assertFalse($this->validator->validate('01 23 45'));
    }

    #[Test]
    public function testInvalidPhoneNumberTooLong() {
        $this->assertFalse($this->validator->validate('01 23 45 67 89 00'));
    }

    #[Test]
    public function testInvalidPhoneNumberIncorrectFormat() {
        $this->assertFalse($this->validator->validate('01-23-45-67-89'));
    }

    #[Test]
    public function testInvalidPhoneNumberContainsLetters() {
        $this->assertFalse($this->validator->validate('01 23 AB 67 89'));
    }

    #[Test]
    public function testInvalidPhoneNumberEmpty() {
        $this->assertFalse($this->validator->validate(''));
    }
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public static function tearDownAfterClass(): void
    {
        fwrite(STDOUT, "\nPHONE_VALIDATOR TESTS FINISH\n");
    }
}