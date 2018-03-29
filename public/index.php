<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);

$router->add('/users/get', ['controller' => 'Users', 'action' => 'get']);
$router->add('/users/delete', ['controller' => 'Users', 'action' => 'delete']);
$router->add('/users/create', ['controller' => 'Users', 'action' => 'create']);
$router->add('/users/update', ['controller' => 'Users', 'action' => 'update']);

$router->add('/auth/get', ['controller' => 'Auth', 'action' => 'get']);
$router->add('/auth/out', ['controller' => 'Auth', 'action' => 'out']);

$router->add('/posts/get', ['controller' => 'Posts', 'action' => 'get']);
$router->add('/posts/delete', ['controller' => 'Posts', 'action' => 'delete']);
$router->add('/posts/create', ['controller' => 'Posts', 'action' => 'create']);
$router->add('/posts/update', ['controller' => 'Posts', 'action' => 'update']);

$router->add('{controller}/{action}');
    
$router->dispatch($_SERVER['QUERY_STRING']);
