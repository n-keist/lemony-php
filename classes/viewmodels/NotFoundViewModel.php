<?php 
namespace lemony\viewmodel;

use lemony\ViewModel;

/**
 * @author Nikolaj Keist (lemony.io)
 */
class NotFoundViewModel extends ViewModel
{
	
	private $model = [];

	function __construct()
	{
		parent::__construct('not-found');
		$this->model['title'] = "Oh oh :/";
	}

	public function getModel() {
		return $this->model;
	}
}
?>