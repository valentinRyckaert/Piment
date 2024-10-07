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
        $_SESSION['csrf_token'] = $token;
        return $token['token'];
    }

    public static function checkToken(string $token): bool {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if($token === $_SESSION['csrf_token']['token'] && (time() - $_SESSION['csrf_token']['time']) <= 600) {
            unset($_SESSION['csrf_token']);
            return true;
        } else {
            unset($_SESSION['csrf_token']);
            return false;
        }
    }
}