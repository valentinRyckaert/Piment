<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class SingletonConfigReaderTest extends TestCase
{
    private \piment\utils\SingletonConfigReader $iniReader;
    protected function setUp(): void
    {
        self::$iniReader->getInstance("configTest.ini");
    }

    public function testGetValueWithExistingKeyAndSection()
    {
        $result = self::$iniReader->getValue('key2', 'section1');
        $this->assertEquals('value2', $result);
    }

    public function testGetValueWithExistingKeyAndNullSection()
    {
        $result = self::$iniReader->getValue('key1');
        $this->assertEquals('value1', $result);
    }

    public function testGetValueWithNonExistingKey()
    {
        $result = self::$iniReader->getValue('key3');
        $this->assertNull($result);
    }

    public function testGetValueWithNonExistingSection()
    {
        $result = self::$iniReader->getValue('key2', 'section2');
        $this->assertNull($result);
    }

    public function testGetValueWithEmptyKeyAndSection()
    {
        $result = self::$iniReader->getValue('', '');
        $this->assertNull($result);
    }
}
