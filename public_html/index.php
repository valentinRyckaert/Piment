<?php

require_once '../vendor/autoload.php';

use piment\controllers\CaserneController;
use piment\controllers\DefaultController;
use piment\controllers\PompierController;
use piment\controllers\Router;

// Accueil
Router::get('/', new DefaultController(), 'index');

// show all
Router::get('/caserne/show', new CaserneController(), 'show');
Router::get('/pompier/affiche', new PompierController(), 'show');

// show one
Router::get('/caserne/detail/#', new CaserneController(), 'detail');
Router::get('/pompier/demo/#', new PompierController(), 'detail');

// show create
Router::get('/caserne/add', new CaserneController(), 'create');
Router::get('/pompier/add', new PompierController(), 'create');

// do create
Router::post('/caserne/save', new CaserneController(), 'do_create');
Router::post('/pompier/save', new PompierController(), 'do_create');

// show delete
Router::get('/caserne/delete/#', new CaserneController(), 'delete');
Router::get('/pompier/delete/#', new PompierController(), 'delete');

// do delete
Router::post('/caserne/delete', new CaserneController(), 'do_delete');
Router::post('/pompier/delete', new PompierController(), 'do_delete');