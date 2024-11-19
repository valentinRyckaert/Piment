<?php

namespace piment\utils;

use piment\models\DAORole;
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
    public static $CANCREATEUSER=256;
    public static $CANREADUSER=512;
    public static $CANUPDATEUSER=1024;
    public static $CANDELETEUSER=2048;

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
        $DAORole = new DAORole(SingletonDatabaseMariaDB::getInstance()->getCnx());
        if($user = $DAOUser->findByLoginPassword($log,$password)) {
            Auth::startSession();
            $_SESSION['user'] = [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'name' => $user->getName(),
                'dateclosure' => $user->getDateClosure(),
                'role' => $user->getRole_id(),
                'perms' => $DAORole->find($user->getRole_id())->getPermissions()
            ];
            return $user;
        }
        return null;
    }

    /**
     * @return void
     */
    public static function logout(): void {
        unset($_SESSION['user']);
    }

    /**
     * @param Role $role
     * @return bool
     */
    public static function has(Role $role): bool {
        return $role == $_SESSION['user']['role'];
    }

    /**
     * @param int $perm
     * @return bool
     */
    public static function can(int $perm): bool {
        Auth::startSession();
        return $perm & $_SESSION['user']['perms'];
    }

    /**
     * @return User
     */
    public static function user(): User {
        return $_SESSION['user'];
    }

    private static function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
}