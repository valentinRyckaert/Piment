<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use piment\utils\SingletonConfigReader;

final class SingletonConfigReaderTest extends TestCase
{
    private static SingletonConfigReader $configReader;

    /**
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        fwrite(STDOUT, "\nTESTS BEGIN\n");
        self::$configReader = SingletonConfigReader::getInstance();
        self::$configReader->setData("/../../configTest.ini");
    }

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $configContent = "
        [database]
        host=localhost
        user=root
        password=secret

        [app]
        name=MyApp
        version=1.0
        ";
        file_put_contents(__DIR__ . '/../../configTest.ini', $configContent);
    }

    #[Test]
    public function checkGetInstanceReturnsSingleton() {
        $instance1 = SingletonConfigReader::getInstance();
        $instance2 = SingletonConfigReader::getInstance();

        $this->assertSame(
            $instance1, $instance2,
            'getInstance should return the same instance'
        );
    }

    #[Test]
    public function checkGetValueReturnsCorrectValue() {

        $this->assertEquals(
            'localhost', self::$configReader->getValue('host', 'database'),
            'Should return the correct host value'
        );
        $this->assertEquals(
            'MyApp', self::$configReader->getValue('name', 'app'),
            'Should return the correct app name'
        );
        $this->assertEquals(
            '1.0', self::$configReader->getValue('version', 'app'),
            'Should return the correct app version'
        );
        $this->assertEquals(
            'hello', self::$configReader->getValue('demo'),
            'Should return the correct demo word'
        );
    }

    #[Test]
    public function checkGetValueReturnsNullForInvalidKey() {

        $this->assertNull(
            self::$configReader->getValue('nonexistent_key'),
            'Should return null for nonexistent key'
        );
        $this->assertNull(
            self::$configReader->getValue('nonexistent_key', 'app'),
            'Should return null for nonexistent key in section'
        );
    }

    #[Test]
    public function checkGetValueReturnsNullForInvalidSection() {

        $this->assertNull(
            self::$configReader->getValue('host', 'nonexistent_section'),
            'Should return null for nonexistent section'
        );
    }

    protected function tearDown(): void {
        if (file_exists(__DIR__ . '/../../configTest.ini')) {
            unlink(__DIR__ . '/../../configTest.ini');
        }
    }

    public static function tearDownAfterClass(): void
    {
        fwrite(STDOUT, "\nTESTS FINISHED\n");
    }
}