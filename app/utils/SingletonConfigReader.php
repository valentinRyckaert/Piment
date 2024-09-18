<?php
namespace piment\utils;

class SingletonConfigReader {
    private static SingletonConfigReader $instance;
    private $data=[];

    /**
     *
     */
    private function __construct(){
        //TODO : lecture du fichier config.ini et stockage en memoire de $data
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
     * Return the value associated to a key in a section
     * @param string $key
     * @param string|null $section
     * @return string|null
     */
    public function getValue(string $key, string $section=null) : ?string {
        if($section==null){

        } else {

        }
        return;
    }

}