<?php 
$path = lemony\Utils::getInstance()->getPath();

$mustacheEngine = new Mustache_Engine([
      'charset' => "UTF-8",
      'escape' => function($value) {
            return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
      },
      'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views')
    ]);

$requestUri = $_SERVER['REQUEST_URI'];
$hasBasepath = $router->hasBasepath();

$substrAmount = 2;

if($hasBasepath) {
	$substrAmount += strlen($router->getBasepath());
}

if($router->startsWith($requestUri, "/?" . $router->getBasepath())) {
  $requestUri = substr($requestUri, $substrAmount);
}

#var_dump([$substrAmount, $requestUri]);

if($router->routeExists($requestUri, $_SERVER['REQUEST_METHOD'])) {
  $router->run($mustacheEngine, $requestUri, $_SERVER['REQUEST_METHOD']);
} else {
  $router->run($mustacheEngine, '/not-found', $_SERVER['REQUEST_METHOD']);
}
?>