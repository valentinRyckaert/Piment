<?php

namespace piment\controllers;

class Router
{

    public static function get($path, $controller, $controllerMethod) : void
    {
        self::_handleRequest('GET', $path, $controller, $controllerMethod);
    }

    public static function post($path, $controller, $controllerMethod) : void
    {
        self::_handleRequest('POST', $path, $controller, $controllerMethod);
    }

    private static function _handleRequest($route_method, $route_path, $controller, $controllerMethod) {

        $client_method = $_SERVER['REQUEST_METHOD'];
        $client_path = $_SERVER['REQUEST_URI'];

        $client_path = substr($client_path, -1) === '/'
            ? substr($client_path, 0, -1)
            : $client_path
        ;

        $route_path = substr($route_path, -1) === '/'
            ? substr($route_path, 0, -1)
            : $route_path
        ;
    /*
        echo $client_path;
        echo "<br>";
        echo $route_path;
        echo "<br><br>";
    */


        if ($client_method !== $route_method) {
            return;

        } elseif ($client_path === $route_path) {
            $controller->$controllerMethod();

        } elseif (str_contains($route_path, "#")
            && array_slice(explode('/', $client_path), 0, -1)
            === array_slice(explode('/', $route_path), 0, -1)
        ) {
            $arguments = explode('/', $client_path);
            $arguments = end($arguments);
            $controller->$controllerMethod($arguments);
        }
    }
}