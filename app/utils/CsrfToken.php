<?php

namespace piment\utils;

class CsrfToken {
    private static $token_name = 'csrf_token';
    public static function generateToken(): string {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $token = [
            'token' => bin2hex(random_bytes(128)),
            'time' => time()
        ];
        $_SESSION[self::$token_name] = $token;
        return $token['token'];
    }

    public static function checkToken(string $token): bool {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if($token === $_SESSION[self::$token_name]['token'] && (time() - $_SESSION[self::$token_name]['time']) <= 600) {
            unset($_SESSION[self::$token_name]);
            return true;
        } else {
            unset($_SESSION[self::$token_name]);
            return false;
        }
    }
}