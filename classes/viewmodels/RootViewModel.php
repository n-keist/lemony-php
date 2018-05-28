<?php 
namespace lemony\viewmodel;

use lemony\ViewModel;

/**
 * @author Nikolaj Keist (lemony.io)
 */
class RootViewModel extends ViewModel
{
	
	private $model = [];

	function __construct()
	{
		parent::__construct('main');
		$this->model['title'] = "foo";
	}

	public function getModel() {
		return $this->model;
	}
}
?>