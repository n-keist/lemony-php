<?php 

namespace lemony;

/**
 * @author Nikolaj Keist (lemony.io)
 */
class Utils
{
	
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
   	
   	/**
   	 * Returns a formatted Path array, automatically strips index.php
	 */
	public function getPath()
	{
		$raw = $_SERVER['REQUEST_URI'];
		$raw = substr($raw, 2);
		$pathArray = explode('/', trim($raw, '/'));
		if($pathArray[0] == "index.php") 
			unset($pathArray[0]);
		return $pathArray;
	}
}
?>