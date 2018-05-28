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

	/**
     * The Template to render
     * @return string (template name)
	 */
	public function getTemplate()
	{
		return $this->template;
	}

	/**
	 * Returns the rendering model based on the Template #getTemplate
	 * @return array
	 */
	abstract function getModel();

	/**
	 * Function that is called before rendering, intended for calculations, database queries etc
	 * @param $params Array that are given in the route e.g /user/{userId} => $params['userId']
	 */
	abstract function run($params);
}
?>