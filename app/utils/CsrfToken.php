<?php

namespace piment\utils;

class CsrfToken
{
    private static $token_name = 'csrf_token';
    public static function generateToken(): string
    {

    }

    public static function checkToken(string $token): bool
    {

    }
}