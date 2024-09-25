<?php

namespace piment\utils;

class Render {
    private $path = __DIR__ . "/views";

    public static function render(string $page, array $data=null) : ?string {

        if (SingletonconfigReader::getInstance()->getValue("debug") == "true"){
            set_error_handler(self::errror_handler());
        }

        ob_start();
        if($data==null) {
            extract($data);
        }
        include_once $path;
        
        $content = ob_get_contents();
        ob_clean();
        return $content;
    }

    private static function  errror_handler($severity, $message, $filename, $linenum) {
        if(errror_reporting() == 0) {
            return;
        }
    }
}