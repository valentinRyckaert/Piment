<?php

namespace piment\utils\validators;

class PhoneValidator implements InterfaceValidator
{
    /**
     * @param string $data
     * @return bool
     */
     public function validate(string $data): bool
     {
            // règle de validation du numéro de téléphone : 10 chiffres, commençant par 0, accepte les éspace et les tirets entre deux par paire.
            return preg_match("/^0[1-9]([-. ]?[0-9]{2}){4}$/", $data);

     }
}