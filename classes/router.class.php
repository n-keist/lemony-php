<?php 
namespace lemony;
/**
 * @author Nikolaj Keist (lemony.io)
 */
class Router
{
	
	private $routes = [];

	protected static $_instance = null;
 
	public static function getInstance()
	{
		if (null === self::$_instance)
		{
			self::$_instance = new self;
		}
		return self::$_instance;
	}
	 	   
	protected function __clone() {}
   
   	protected function __construct() {}

   	public function add($route, ViewModel $viewmodel, $method = 'GET') {
   		$baseRoute = preg_replace('/{(.*?)}/', '', $route);
   		$this->routes[] = ['route' => $baseRoute, 'model' => $viewmodel, 'method' => $method];
   	}

   	public function routeExists($route, $requestMethod) {
   		$routeExists = false;
   		$baseRoute = preg_replace('/{(.*?)}/', '', $route);
   		$baseRoute = trim($baseRoute, '/');
   		
   		foreach($this->routes as $route_) {

   			if($route_['method'] == $requestMethod) {

   				$routeArray = explode('/', trim($route_['route'], '/'));
   				$routeRequestArray = explode('/', $baseRoute);

   				for($i = 0; $i < sizeof($routeArray); $i++) {
   					if($routeArray[$i] == $routeRequestArray[$i] && !strpos($routeArray[$i], "{")) {
   						$routeExists = true;
   					}
   				}

   			}
   		}
   		#var_dump($routeExists);
   		return $routeExists;
   	}

   	public function getRoute($route, $requestMethod) {
   		$outputRoute = null;
   		$baseRoute = preg_replace('/{(.*?)}/', '', $route);
   		$baseRoute = trim($baseRoute, '/');
   		
   		foreach($this->routes as $route_) {

   			if($route_['method'] == $requestMethod) {

   				$routeArray = explode('/', trim($route_['route'], '/'));
   				$routeRequestArray = explode('/', $baseRoute);

   				for($i = 0; $i < sizeof($routeArray); $i++) {
   					if($routeArray[$i] == $routeRequestArray[$i] && !strpos($routeArray[$i], "{")) {
   						$outputRoute = $route_;
   					}
   				}

   			}
   		}
   		return $outputRoute;
   	}

   	public function run($mustacheEngine, $route, $requestMethod) {
		
		$baseRoute = preg_replace('/{(.*?)}/', '', $route);

   		$routeData = self::getRoute($route, $requestMethod);

		preg_match_all('/{(.*?)}/', $route, $matchesRequest);
   		preg_match_all('/{(.*?)}/', $routeData['route'], $matches);
   		
   		var_dump($matches[1]);

   		$requestParams = [];

		for ($i = 0; $i < sizeof($matchesRoute[1]); $i++) {
   			$requestParams[$matchesRoute[1][$i]] = $matchesRequest[1][$i];
   		}

   		$viewModel = $routeData['model'];
   		
   		$html = $viewModel->run($requestParams);
   		if($viewModel->getTemplate() == null) {
   			echo $html;
   		} else {
   			$template = $mustacheEngine->loadTemplate($viewModel->getTemplate());
  			echo $template->render($viewModel->getModel());
   		}
   	}

   	public function startsWith($haystack, $needle)
	{
	     $length = strlen($needle);
	     return (substr($haystack, 0, $length) === $needle);
	}
}
?>