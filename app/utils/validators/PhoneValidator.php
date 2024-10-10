<?php

namespace piment\utils\validators;

class PhoneValidator implements InterfaceValidator
{
    /**
     * @param string $data
     * @return bool
     */
    public function validate(string $data): bool {
        return preg_match(
            "/^(?!00)(?!08)\d{2}(?: \d{2}){4}$/",
            $data
        );
    }
}