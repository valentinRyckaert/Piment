<?php

namespace piment\utils;

class SingletonConfigReader {
    private static SingletonConfigReader $instance;
    private array $data=[];

    private function __construct(){
        $this->data=parse_ini_file("config.ini", true);
    }

    public static function getInstance() : SingletonConfigReader {
        if(!isset(self::$instance)){
            self::$instance = new SingletonConfigReader();
        }
        return self::$instance;
    }

    /**
     * Return the value associated to a key in a section
     * @param string $key
     * @param string|null $section
     * @return string|null
     */
    public function getValue(string $key, string $section=null) : ?string {
        if($section==null){
            return $this->data[$key];
        } else {
            return $this->data[$section][$key];
        }
    }
}