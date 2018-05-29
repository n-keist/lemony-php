<?php 
namespace lemony;
/**
 * @author Nikolaj Keist (lemony.io)
 */
class Config
{

	/*
	 * things you are allowed to edit
	 */

	public function getSQLHost()
	{
		return "localhost";
	}

	public function getSQLUsername()
	{
		return "test";
	}

	public function getSQLPassword()
	{
		return "benutzer";
	}

	public function getSQLDatabase()
	{
		return "datenbank";
	}

	/*
	 * NEVER EVER CHANGE SOMETHING DOWN THERE. thank you.
	 */

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
}
?>