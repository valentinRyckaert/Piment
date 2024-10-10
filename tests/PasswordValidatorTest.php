<?php

namespace tests;
use piment\utils\validators\PasswordValidator;
use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{

    private $validator;

    public static function setUpBeforeClass(): void
    {
        fwrite(STDOUT, "\nPASSWORD_VALIDATOR TESTS BEGIN\n");
    }

    protected function setUp(): void {
        $this->validator = new PasswordValidator();
    }

    #[Test]
    public function testValidPassword() {
        $this->assertTrue($this->validator->validate('&aB123456789'));
        $this->assertTrue($this->validator->validate('#zX9876543210'));
        $this->assertTrue($this->validator->validate('!mN1234567890'));
        $this->assertTrue($this->validator->validate('@Abcdef12345!'));
    }

    #[Test]
    public function testInvalidPasswordNoSpecialChar() {
        $this->assertFalse($this->validator->validate('aB123456789'));
    }

    #[Test]
    public function testInvalidPasswordNoLowercase() {
        $this->assertFalse($this->validator->validate('&AB123456789'));
    }

    #[Test]
    public function testInvalidPasswordNoUppercase() {
        $this->assertFalse($this->validator->validate('&ab123456789'));
    }

    #[Test]
    public function testInvalidPasswordNoDigits() {
        $this->assertFalse($this->validator->validate('&aBabcdefghij'));
    }

    #[Test]
    public function testInvalidPasswordTooShort() {
        $this->assertFalse($this->validator->validate('&aB1234'));
    }

    #[Test]
    public function testInvalidPasswordEmpty() {
        $this->assertFalse($this->validator->validate(''));
    }


    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public static function tearDownAfterClass(): void
    {
        fwrite(STDOUT, "\nPASSWORD_VALIDATOR TESTS FINISH\n");
    }

}