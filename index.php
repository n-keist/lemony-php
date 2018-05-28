<?php 
require __DIR__ . '/vendor/autoload.php';

$router = lemony\Router::getInstance();

$router->add('/', new lemony\viewmodel\RootViewModel());
$router->add('/not-found', new lemony\viewmodel\NotFoundViewModel());

include 'app/controller.php';
?>