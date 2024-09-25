<?php
namespace piment\utils;
use piment\utils\SingletonConfigReader;

class Render {

    public static function render($view, array $data=null): ?string {

        $path = dirname(__DIR__) . '/views/' . $view . '.php';
        if(SingletonConfigReader::getInstance()->getValue('debug')) {
            set_error_handler([self::class, 'error_Handler']);
        }
        ob_start();
        if ($data != null) {
            extract($data);
        }

        include_once $path;

        $content = ob_get_contents();
        ob_clean();
        return $content;

    }

    private static function error_Handler($severity, $message, $filename, $line) {
        if (error_reporting( )==0){
            return;
        }

        if (error_reporting() & $severity) {
            throw new \ErrorException($message, 0, $severity, $filename, $line);
        }
    }

}