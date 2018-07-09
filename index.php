<?php 
require __DIR__ . '/vendor/autoload.php';

$router = lemony\Router::getInstance();

$router->basepath('/app');

$router->route('/', new lemony\viewmodel\RootViewModel());
$router->route('/user/{userId@([0-9])}/create', new lemony\viewmodel\TestViewModel());

# > DO NOT < remove this one. thank you.
$router->route('/not-found', new lemony\viewmodel\NotFoundViewModel());

include 'app/controller.php';
?>