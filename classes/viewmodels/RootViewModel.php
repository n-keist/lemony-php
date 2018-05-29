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
		$this->model['title'] = "QUEREIIEIEIS";
	}

	public function getModel() {
		return $this->model;
	}

	public function run($params) {
		$query = db::getInstance()
					->table('test')
					->delete()
					->where(['id' => 1]);
		$this->model['query'] = $query->getQuery();
		$this->model['parameters'] = var_export($query->getParams(), true);
	}
}
?>