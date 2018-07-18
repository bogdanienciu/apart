<?php
namespace App\DB;

use PDO;
use PDOException;

/**
 */
class MySQLConnection
{
	private $connection;

	public function __construct()
	{

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "apartments";

		try {
			$this->connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}

	public function getConnection() {
		return $this->connection;
	}

	public function insert($table, $fields) {
		$columnsString = join(array_keys($fields), ', ');
		$valuesPlaceholder = ":" . join(array_keys($fields), ', :');

		$insert = $this->connection->prepare("INSERT INTO $table ($columnsString)
   			VALUES($valuesPlaceholder)");
		$insert->execute($fields);

		return $this->connection->lastInsertId();
	}

	public function select($sql, $params = []) {
		$select = $this->connection->prepare($sql);
		$select->execute($params);

		return $select->fetchAll();
	}

	public function first($sql, $params = []) {
		return $this->select($sql, $params)[0];
	}

	public function update($table, $id, $fields) {
		$pairs = [];
		$params = [];

		foreach ($fields as $key => $value) {
			$pairs[] = $key . " = ?";
			$params[] = $value;
		}

		$params[] = $id;

		$setString = join(', ', $pairs);

		$sql = "update $table set $setString where id = ?";

		$update = $this->connection->prepare($sql);
		$update->execute($params);
	}

	public function delete($table, $id) {
		// $sql = "delete from $table where id = ?";
		$sql = "update $table set deleted_at = now() where id = ?";

		$delete = $this->connection->prepare($sql);
		$delete->execute([$id]);
	}
}
