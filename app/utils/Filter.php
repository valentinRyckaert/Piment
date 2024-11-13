<?php

namespace piment\utils;

use piment\utils\validators\InterfaceValidator;
use piment\utils\validators\CPValidator;
use piment\utils\validators\PasswordValidator;
use piment\utils\validators\MailValidator;
use piment\utils\validators\PhoneValidator;

class Filter
{
    private array $validators = [];

    public function __construct()
    {
        $this->validators = [];

    }

    public function addValidator(string $key, InterfaceValidator $validator ) : void
    {
        $this->validators[$key] = $validator;

    }

    public function execute(array $data) : array
    {
        $result = [];
        foreach ($data as $key => $value) {
            if (isset($this->validators[$key])) {
                $result[$key] = $this->validators[$key]->validate($value);
            }
        }
        return $result;
    }


}