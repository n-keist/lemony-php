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
	}

	public function getModel() {
		return $this->model;
	}

	public function run($params) {
		$this->model['title'] = "Benutzer!";
		$this->model['userId'] = $params['userId'];
		$this->model['userAction'] = $params['userAction'];
		$this->model['dumpStr'] = "userId={$params['userId']};userAction={$params['userAction']}";
	}
}
?>