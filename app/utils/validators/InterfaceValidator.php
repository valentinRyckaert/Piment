<?php

namespace piment\utils\validators;

interface InterfaceValidator {

    /**
     * @param string $data
     * @return bool
     */
    public function validate(string $data) : bool;

}