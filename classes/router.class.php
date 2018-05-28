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

   	public function add($route, $viewmodel) {
   		$routes[] = ['route' => $route, 'model' => $viewmodel];
   	}

   	public function routeExists($route) {
   		$routeExists = false;
   		foreach($this->routes as $routes) {
   			if($routes['route'] == $route) {
   				$routeExists = true;
   			}
   		}
   		return $routeExists;
   	}

   	public function get($route) {
   		$outputRoute = null;
   		foreach ($this->routes as $routes) {
   			if($routes['route'] == $route) {
   				$outputRoute = $route;
   			}
   		}
   		return $outputRoute;
   	}

   	public function run($mustacheEngine, $route) {
   		$request = self::get($route);

		$template = $mustacheEngine->loadTemplate($request['model']->getTemplate());
  		echo $template->render($request['model']->getModel());
   	}
}
?>