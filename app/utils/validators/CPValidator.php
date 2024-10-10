<?php

namespace piment\utils\validators;

use piment\utils\validators\InterfaceValidator;

class CPValidator implements InterfaceValidator
{

    /**
     * @inheritDoc
     */
    public function validate(string $data): bool
    {
        // règle de validation du code postal : 5 chiffres, allant de 01000 à 98999.
        return preg_match("/^(0[1-9][0-9]{3}|[1-8][0-9]{4}|9[0-8][0-9]{3}|98999)$/", $data);
    }
}