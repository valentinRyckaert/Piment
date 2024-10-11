<?php

namespace piment\utils\validators;

use piment\utils\validators\InterfaceValidator;

class MailValidator implements InterfaceValidator
{

    /**
     * @inheritDoc
     */
    public function validate(string $data): bool
    {
        return preg_match('/^(?!.*\.\.)([a-zA-Z0-9._%+-]+)@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $data);
    }
}