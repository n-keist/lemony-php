<?php 
$path = lemony\Utils::getInstance()->getPath();

$mustacheEngine = new Mustache_Engine([
      'charset' => "UTF-8",
      'escape' => function($value) {
            return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
      },
      'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views')
    ]);

if(isset($path[0]) && $path[0] != "") {
  $pageRequested = $path[0];
  $responseTemplate = '';
  $model = [];
  if($router->routeExists($path[0])) {
    $router->run($mustacheEngine, $path[0]);
  } else {
    $router->run($mustacheEngine, 'not-found');
  }
}
?>