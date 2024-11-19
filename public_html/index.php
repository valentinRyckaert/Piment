<?php

require_once '../vendor/autoload.php';

use piment\controllers\CaserneController;
use piment\controllers\DefaultController;
use piment\controllers\PompierController;
use piment\controllers\UserController;
use piment\utils\Auth;
use piment\utils\Router;

// Accueil
Router::get('/', new DefaultController(), 'index');
Router::get('/login', new DefaultController(), 'login');
Router::post('/login', new DefaultController(), 'do_login');
Router::get('/logout', new DefaultController(), 'logout');

// show all
Router::get('/caserne/show', new CaserneController(), 'show', Auth::$CANREADCASERNE);
Router::get('/pompier/affiche', new PompierController(), 'show', Auth::$CANREADPOMPIER);

// show specific
Router::get('/caserne/showspecific', new CaserneController(), 'showByItem', Auth::$CANREADCASERNE);
Router::get('/pompier/showspecific', new PompierController(), 'showByItem', Auth::$CANREADPOMPIER);

// show one
Router::get('/caserne/detail/#', new CaserneController(), 'detail', Auth::$CANREADCASERNE);
Router::get('/pompier/demo/#', new PompierController(), 'detail', Auth::$CANREADPOMPIER);

// create
Router::get('/caserne/add', new CaserneController(), 'create', Auth::$CANCREATECASERNE);
Router::get('/pompier/add', new PompierController(), 'create', Auth::$CANCREATEPOMPIER);
Router::post('/caserne/save', new CaserneController(), 'do_create', Auth::$CANCREATECASERNE);
Router::post('/pompier/save', new PompierController(), 'do_create', Auth::$CANCREATEPOMPIER);

// delete
Router::get('/caserne/delete/#', new CaserneController(), 'delete', Auth::$CANDELETECASERNE);
Router::get('/pompier/delete/#', new PompierController(), 'delete', Auth::$CANDELETEPOMPIER);
Router::post('/caserne/delete', new CaserneController(), 'do_delete', Auth::$CANDELETECASERNE);
Router::post('/pompier/delete', new PompierController(), 'do_delete', Auth::$CANDELETEPOMPIER);

// User
Router::get('/user/show', new UserController(), 'show', Auth::$CANREADUSER);
Router::get('/user/detail/#', new UserController(), 'detail', Auth::$CANREADUSER);
Router::get('/user/add', new UserController(), 'create', Auth::$CANCREATEUSER);
Router::post('/user/save', new UserController(), 'do_create', Auth::$CANCREATEUSER);
Router::get('/user/delete/#', new UserController(), 'delete', Auth::$CANDELETEUSER);
Router::post('/user/delete', new UserController(), 'do_delete', Auth::$CANDELETEUSER);