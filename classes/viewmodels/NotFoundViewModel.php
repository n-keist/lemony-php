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
		$this->model['title'] = "Site Error :: 404 - We couldn't find what you were looking for";
	}

	public function getModel() 
	{
		return $this->model;
	}

	public function run($params) 
	{
		http_response_code(404);
	}
}
?>