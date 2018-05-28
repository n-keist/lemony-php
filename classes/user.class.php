<?php 

namespace lemony;

/**
 * @author Nikolaj Keist (lemony.io)
 */
class User
{
	private $id;

	function __construct($id)
	{
		$this->id = $id;	
	}

	public function getString()
	{
		return "Ich bin der Benutzer #{$this->id}";
	}
}
?>