<?php

//https://www.youtube.com/watch?v=tbYa0rJQyoM
//https://www.youtube.com/watch?v=-iW6lo6wq1Y
//https://openclassrooms.com/fr/courses/2078536-developpez-votre-site-web-avec-le-framework-symfony2-ancienne-version/2079345-le-routeur-de-symfony2

//echo "<pre>" . print_r($_SERVER, true) . "<pre>";
use piment\controllers\CaserneController;
use piment\controllers\DefaultController;
use piment\controllers\PompierController;


require_once '../vendor/autoload.php';



if (isset($_SERVER["PATH_INFO"])) {
    $path = trim($_SERVER["PATH_INFO"], "/");
} else {
    $path = "";
}


$fragments = explode("/", $path);

//var_dump($fragment);

$control = array_shift($fragments);
//echo "control : $control <hr>";
switch ($control) {
    case '' :
    { //l'url est /
        defaultRoutes_get($fragments);
        break;
    }
    case "pompier" :
    {
        //echo "Gestion des routes pour pompier <hr>";
        //calling function to prevend all hard code here
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            pompierRoutes_get($fragments);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            pompierRoutes_post($fragments);
        }
        break;
    }
    case "caserne" :
    {
        //echo "Gestion des routes pour caserne<hr>";
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            caserneRoutes_get($fragments);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            caserneRoutes_post($fragments);
        }
        break;
    }
    default :
    {
        //Gestion du probleme
        echo "Erreur URL ";
    }
}


function defaultRoutes_get($fragments)
{
    call_user_func_array([ new DefaultController(), "index"], $fragments);
}


function pompierRoutes_get($fragments)
{

    //var_dump($fragment);

    $action = array_shift($fragments);
    //var_dump($action);

    switch ($action) {
        case "affiche" :
        {
            //http://127.0.0.1:8080/pompier/show/5?p=25&a=12
            //echo "Calling pompierController->show <hr>";
            call_user_func_array([ new PompierController(), "show"], $fragments);
            break;
        }
        case "demo" :
        {
            //http://127.0.0.1:8080/pompier/demo/1/45?p=2
            //echo "Calling pompierController->demo_test <hr>";
            //var_dump($fragments);
            call_user_func_array([new PompierController(), "detail"], $fragments);
            break;
        }
        case "delete" :
        {
            //echo "Calling pompierController->del <hr>";
            //Access permission can be checked here too
            call_user_func_array([new PompierController(), "delete"], $fragments);
            break;
        }
        case "add" :
        {
            call_user_func_array([new PompierController(), "create"], $fragments);
            break;
        }
        case "edit" :
        {
            //echo "Calling pompierController->del <hr>";
            call_user_func_array([new PompierController(), "edit"], $fragments);
            break;
        }
        default :
        {
            echo "Action '$action' non defini <hr>";
            //Gestion du probleme
        }
    }
}

function pompierRoutes_post($fragments)
{

    $action = array_shift($fragments);
    switch ($action) {
        case "delete":
            //Access permission can be checked here too
            call_user_func_array([new PompierController(), "do_delete"], $fragments);
            break;
        case "update" :
            //echo "Action '$action' ready <hr>";
            //Access permission can be checked here too
            call_user_func_array([new PompierController(), "update"], $fragments);
            break;
        case "save":
            //Access permission can be checked here too
            call_user_func_array([new PompierController(), "do_create"], $fragments);
            break;
        default:
            echo "Action '$action' non defini <hr>";
            break;
    }
}

function caserneRoutes_get($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {
        case "show":
            call_user_func_array([new CaserneController(), "show"], $fragments);
            break;
        case "detail" :
            call_user_func_array([new CaserneController(), "detail"], $fragments);
            break;
        case "add" :
            call_user_func_array([new CaserneController(), "create"], $fragments);
            break;
        case "delete" :
            call_user_func_array([new CaserneController(), "delete"], $fragments);
            break;

        default:
            echo "Action '$action' non defini <hr>";
            break;
    }
}

function caserneRoutes_post($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {
        case "delete" :
            call_user_func_array([new CaserneController(), "do_delete"], $fragments);
            break;
        case "save" :
            call_user_func_array([new CaserneController(), "do_create"], $fragments);
            break;
        default:
            break;
    }
}
