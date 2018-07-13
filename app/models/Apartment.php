<?php
namespace App\Models;

use App\Models\ApartmentPicture;
use App\Models\Category;

class Apartment extends Model
{
	
	private $apartmentpicture;
	private $specificationCategories;

	
	public function setApartmentPictures($pictures) {
			$result = [];

		foreach ($pictures as $picture) {
			$result[] = new ApartmentPicture($picture['url']);
		}

		$this->apartmentpictures = $result;
	}

	public function getApartmentPictures() {
		return $this->apartmentpictures;
	}

	public function getDetails() {
			return $this->fields['details'];
	}

	public function setSpecificationCategories($categories) {
		$result = [];

		foreach ($categories as $category) {
			$result[] = new Category($category);
		}

		$this->specificationCategories = $result;
	}

	public function getSpecificationCategories() {
		return $this->specificationCategories;
	}

	function getSpecificationValue($specification_id) {
		foreach ($this->getSpecificationCategories() as $category) {
			foreach ($category->getSpecifications() as $specification) {
				if ($specification->getId() == $specification_id) {
					return $specification->getValue();
				}
			}
		}

		return '';
	}
}
