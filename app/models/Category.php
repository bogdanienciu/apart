<?php
namespace App\Models;

use App\Models\Specification;

/**
 */
class Category extends Model
{
	public function setSpecifications($specifications) {
		$result = [];

		foreach ($specifications as $specification) {
			$result[] = new Specification($specification);
		}

		$this->specifications = $result;
	}

	public function getSpecifications() {
		return $this->specifications;
	}
}
