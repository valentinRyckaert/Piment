<?php

namespace piment\utils;

use piment\models\User;
use piment\models\DAOUser;

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
        if(isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    /**
     * @param string $log
     * @param string $password
     * @return User|null
     */
    public static function login(string $log, string $password): ?User {
        $DAOUser = new DAOUser(SingletonDatabaseMariaDB::getInstance()->getCnx());
        if($user = $DAOUser->findByLoginPassword($log,$password)) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['name'] = $user->getName();
            $_SESSION['dateclosure'] = $user->getDateClosure();
            return $user;
        }
        return null;
    }

    /**
     * @return void
     */
    public static function logout(): void {
        session_destroy();
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
        return htmlspecialchars($_SESSION['user']);
    }
}