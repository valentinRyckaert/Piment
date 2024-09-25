<?php

namespace piment\utils;
use \piment\utils\SingletonConfigReader;

class Render {
    private $path = __DIR__ . "/views";

    public static function render(string $page, array $data=null) : ?string {

        if (SingletonconfigReader::getInstance()->getValue("debug") == "true"){
            set_error_handler(self::error_handler());
        }

        ob_start();
        if($data!==null) {
            extract($data);
        }
        include_once $page;
        
        $content = ob_get_contents();
        ob_clean();
        return $content;
    }

    private static function  error_handler($severity, $message, $filename, $linenum) {
        if(error_reporting() == 0) {
            return;
        }
    }
}