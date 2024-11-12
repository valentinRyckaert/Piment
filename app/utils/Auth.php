<?php

namespace piment\utils;

use piment\models\User;
use piment\models\DAOUser;

class Auth
{
    public static $KEY="Authv5.1";
    public static $CANCREATEPOMPIER=1;
    public static $CANREADPOMPIER=2;
    public static $CANUPDATEPOMPIER=4;
    public static $CANDELETEPOMPIER=8;
    public static $CANCREATECASERNE=16;
    public static $CANREADCASERNE=32;
    public static $CANUPDATECASERNE=64;
    public static $CANDELETECASERNE=128;
    public static $CANCREATEROLE=256;
    public static $CANREADROLE=512;
    public static $CANUPDATEROLE=1024;
    public static $CANDELETEROLE=2048;

    /**
     * @return bool
     */
    public static function is_logged(): bool {
        Auth::startSession();
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
            Auth::startSession();
            $_SESSION['user'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['name'] = $user->getName();
            $_SESSION['dateclosure'] = $user->getDateClosure();
            $_SESSION['role'] = $user->getRole();
            $_SESSION['perms'] = $user->getRole()->getPermissions();
            return $user;
        }
        return null;
    }

    /**
     * @return void
     */
    public static function logout(): void {
        $_SESSION = [];
    }

    /**
     * @param Role $role
     * @return bool
     */
    public static function has(Role $role): bool {
        return $role === $_SESSION['role'];
    }

    /**
     * @param int $perm
     * @return bool
     */
    public static function can(int $perm): bool {
        Auth::startSession();
        return $perm & $_SESSION['perms'];
    }

    /**
     * @return User
     */
    public static function user(): User {
        return htmlspecialchars($_SESSION['user']);
    }

    private static function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
}