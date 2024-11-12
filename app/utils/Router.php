<?php

namespace piment\utils;

use piment\controllers\DefaultController;

class Router
{

    public static function get($path, $controller, $controllerMethod, $authorized=null) : void
    {
        self::_handleRequest('GET', $path, $controller, $controllerMethod, $authorized);
    }

    public static function post($path, $controller, $controllerMethod, $authorized=null) : void
    {
        self::_handleRequest('POST', $path, $controller, $controllerMethod, $authorized);
    }

    private static function _handleRequest($route_method, $route_path, $controller, $controllerMethod, $authorized) {

        // if the user hasn't the perms in its role (stored in session), block route
        if(isset($authorized)) {
            if(!Auth::can($authorized)) {
                $errorController = new DefaultController();
                $errorController->error();
            }
        }

        $client_method = $_SERVER['REQUEST_METHOD'];
        $client_path = $_SERVER['REQUEST_URI'];

        $client_path = strtok($client_path,'?');

        $client_path = substr($client_path, -1) === '/'
            ? substr($client_path, 0, -1)
            : $client_path
        ;

        $route_path = substr($route_path, -1) === '/'
            ? substr($route_path, 0, -1)
            : $route_path
        ;

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
        } else {
            $errorController = new DefaultController();
            $errorController->error();
        }
    }
}