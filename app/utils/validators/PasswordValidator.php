<?php

namespace piment\utils\validators;

use \piment\utils\validators\InterfaceValidator;

class PasswordValidator implements InterfaceValidator {

    /**
     * @param string $data
     * @return bool
     */
    public function validate(string $data): bool {
        return preg_match(
            "/^(?=.*[&%#@=+!?;:_])(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{12,}$/",
            $data
        );
    }

}