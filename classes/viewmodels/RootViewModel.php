<?php 
namespace lemony\viewmodel;

use lemony\ViewModel;
use lemony\db;

/**
 * @author Nikolaj Keist (lemony.io)
 */
class RootViewModel extends ViewModel
{
	
	private $model = [];

	function __construct()
	{
		parent::__construct('main');
	}

	public function getModel() {
		return $this->model;
	}

	public function run($params) {
		$this->model['title'] = "lemony-php";
	}
}
?>