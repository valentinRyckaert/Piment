<?php

namespace piment\utils;

class Render
{
    $path = ""; // TODO cf __DIR__
    
    if (SinglletonconfigReader::getInstance()->getValue("debug") == "true"){
        set_error_handler('self::error_handler');
    }
    public static render(string $page, array $data=null) : ?string {

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