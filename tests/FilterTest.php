<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use piment\utils\Filter;
use piment\utils\validators\PasswordValidator;
use piment\utils\validators\MailValidator;
use piment\utils\validators\PhoneValidator;
use piment\utils\validators\CPValidator;
#use PHPUnit\Framework\assertTrue;

class FilterTest extends TestCase
{
    public function testExecute()
    {
        $filter = new Filter();
        $filter->addValidator('password', new PasswordValidator());
        $filter->addValidator('mail', new MailValidator());
        $filter->addValidator('phone', new PhoneValidator());
        $filter->addValidator('cp', new CPValidator());

        $data = [
            'password' => '&aB123456789',
            'mail' => 'exemple@domaine.com',
            'phone' => '01 23 45 67 89',
            'cp' => '75000'];

        $result = $filter->execute($data);
        $this->assertTrue($result['password']);
        $this->assertTrue($result['mail']);
        $this->assertTrue($result['phone']);
        $this->assertTrue($result['cp']);

        $data2 = [
            'password' => 'aB123456789',
            'mail' => 'exemple@domaine..com',
            'phone' => '01 23 45 67 89 02',
            'cp' => '750'];

        $result2 = $filter->execute($data2);
        $this->assertFalse($result2['password']);
        $this->assertFalse($result2['mail']);
        $this->assertFalse($result2['phone']);
        $this->assertFalse($result2['cp']);

    }
}
