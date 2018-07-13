<?php
namespace App\DB\Inventories;

use App\Models\Category;

/**
 */
class Categories extends Inventory
{
	public function all() {
		$rows = $this->mysql->select('SELECT * FROM categories where deleted_at is null');

		$categories = [];

		foreach ($rows as $row) {
			$category = new Category($row);

			$specifications = $this->mysql->select('SELECT * FROM specifications where deleted_at is null and category_id = ?', [$category->getId()]);

				$category->setSpecifications($specifications);

			$categories[] = $category;
		}

		return $categories;
	}	
}
