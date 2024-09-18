<?php

namespace piment\utils;

class SingletonConfigReader {
    private static SingletonConfigReader $instance;
    private array $data=[];

    /**
     * Constructor
     */
    private function __construct(){
        $this->data=parse_ini_file("config.ini", true);
    }

    /**
     * Return the information about config.ini
     * @return SingletonConfigReader
     */
    public static function getInstance() : SingletonConfigReader {
        if(!isset(self::$instance)){
            self::$instance = new SingletonConfigReader();
        }
        return self::$instance;
    }

    /**
     * Return the information about config.ini
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