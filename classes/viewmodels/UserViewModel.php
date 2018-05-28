<?php 
namespace lemony\viewmodel;

use lemony\ViewModel;

/**
 * @author Nikolaj Keist (lemony.io)
 */
class UserViewModel extends ViewModel
{
	
	private $model = [];

	function __construct()
	{
		parent::__construct('user');
		$this->model['title'] = "Benutzer!";
	}

	public function getModel() {
		return $this->model;
	}

	public function run($params) {
		$model['userId'] = $params['userId'];
	}
}
?>