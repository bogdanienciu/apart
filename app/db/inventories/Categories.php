<?php
namespace App\DB\Inventories;

use App\Models\Category;

/**
 */
class Categories extends Inventory
{
	public function all() {
		// Aduce din baza de date toate radurile din 'categories'
		$rows = $this->mysql->select('SELECT * FROM categories where deleted_at is null');

		$categories = [];

		// 
		foreach ($rows as $row) {
			$category = new Category($row);

			// Aduce toate randurile 'specifications' din baza de date
			$specifications = $this->mysql->select('SELECT * FROM specifications where deleted_at is null and category_id = ?', [$category->getId()]);

			// Ii zice categoriei sa isi seteze specificatiile
			$category->setSpecifications($specifications);

			$categories[] = $category;
		}

		// Returneaza categoriile construite mai sus
		return $categories;
	}	
}
