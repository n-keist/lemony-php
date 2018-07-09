<?php 
namespace lemony\viewmodel;

use lemony\ViewModel;

/**
 * @author Nikolaj Keist (lemony.io)
 */
class TestViewModel extends ViewModel
{
	
	private $model = [];

	function __construct()
	{
		parent::__construct('test');
	}

	public function getModel() 
	{
		return $this->model;
	}

	public function run($params) 
	{
		$this->model['title'] = "somewhat a laboritory ⚗️";
		$this->model['userId'] = $params['userId'];
		$this->model['pre'] = var_export($params, true);
	}
}
?>