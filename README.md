lemony-php
===
This is a (very) tiny PHP-Framework which was intended to be used in a personal project. 

### Routing and Views
There is no .htaccess to modify, URLs are "beautified" tho, but in a more convenient way. A URL might look like this: 

`http://localhost:8080/?/home`

Registering URLs is easy: Open the index.php file, and start adding routes like followed: 

```php
$router->add('/path/to/route', new namespace\MyViewController(), 'METHOD');
```

The Router supports dynamic parameters like this: 

```php
$router->add('/user/{userId}', new vcs\UserVC());
```

If you add a parameter like this, you are able to fetch `userId` in the `run(params)` method in your ViewController

A simple ViewController (based on the second example) could look like this: 

```php
<?php 
namespace lemony\viewmodel;

use lemony\ViewModel;

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
		$this->model['userId'] = $params['userId'];
	}
}
?>
```

The Template you are using, is defined in the parents constructor. 
All Templates are stored in `/app/views`

**This "framework" is using the Mustache Templating Engine.**

### Database
In `/classes` there is a file called `config.class.php.example`, if you are going to use this feature, rename this file to `config.class.php` and update your credentials.

The database class contains a basic QueryBuilder.

Query Builder Examples: 

_Insert:_

```php
$query = db::getInstance()
			->table('test')
			->insert(['username' => "n-keist", 'age' => 19])
			->getQuery();
```

_Update:_

```php
$query = db::getInstance()
			->table('test')
			->update(['job' => "Software Developer")
			->where(['username' => "n-keist"])
			->getQuery();
```

_Select:_

```php
$query = db::getInstance()
			->table('test')
			->select("age, job")
			->where(['username' => "n-keist"])
			->getQuery();
```
The select method allows more functions like `order(orderType, column)` and `limit(count, offset)`

_Delete_:
```php
$query = db::getInstance()
			->table('test')
			->delete()
			->where(['username' => "n-keist"])
			->getQuery();
```

This class also supports raw queries, if you don't want to rely on the query builder (it could have faults tho) 

```php
$result = db::getInstance()->raw(query, parameters)->execute();
```

### Installation
1. Clone the project
2. run `composer install` in the command prompt
3. update your mysql data