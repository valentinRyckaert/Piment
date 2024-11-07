<?php

namespace piment\utils;

use App\models\User;

class Auth
{
    public static $KEY="Authv5.1";
    public static $CANDELETE=1;
    public static $CANUPDATE=2;
    public static $CANREAD=4;
    public static $CANCREATE=8;

    /**
     * @return bool
     */
    public static function is_logged(): bool {
        return 0;
    }

    /**
     * @param string $log
     * @param string $passwd
     * @return User|null
     */
    public static function login(string $log, string $passwd): ?User {
        return true;
    }

    /**
     * @return void
     */
    public static function logout(): void {

    }

    /**
     * @param Role $role
     * @return bool
     */
    public static function has(Role $role): bool {
        return true;
    }

    /**
     * @param int $perm
     * @return bool
     */
    public static function can(int $perm): bool {
        return true;
    }

    /**
     * @return User
     */
    public static function user(): User {
        return new User();
    }
}