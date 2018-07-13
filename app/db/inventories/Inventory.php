<?php
namespace App\DB\Inventories;

use App\DB\MySQLConnection;

class Inventory {
	protected $mysql;

	public function __construct() {
		$this->mysql = new MySQLConnection();
	}
}
