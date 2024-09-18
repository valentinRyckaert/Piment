<?php

class SingletonDataBaseMariaDB {
    private PDO $cnx;
    private static SingletonDataBaseMariaDB $instance;
}