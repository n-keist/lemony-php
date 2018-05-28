<?php
namespace lemony;

/**
 * @author Nikolaj Keist (lemony.io)
 */
abstract class ViewModel
{
	private $template;

	function __construct($template)
	{
		$this->template = $template;
	}

	public function getTemplate()
	{
		return $this->template;
	}

	abstract function getModel();
}
?>