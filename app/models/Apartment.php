<?php
namespace App\Models;

use App\Models\ApartmentPicture;
use App\Models\Category;

class Apartment extends Model
{
	
	private $apartmentpictures;
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

	public function getNrCamere() {
			return $this->fields['nr_camere'];
	}

	public function getSuprafataUtila() {
			return $this->fields['suprafata_utila'];
	}

	public function getCompartimentare() {
			return $this->fields['compartimentare'];
	}

	public function getConfort() {
			return $this->fields['confort'];
	}

	public function getEtaj() {
			return $this->fields['etaj'];
	}

	public function getNrBai() {
			return $this->fields['nr_bai'];
	}

	public function getAnConstructie() {
			return $this->fields['an_constructie'];
	}

	public function getStructuraRezistenta() {
			return $this->fields['structura_rezistenta'];
	}

	public function getLift() {
			return $this->fields['lift'];
	}

	public function getTipImobil() {
			return $this->fields['tip_imobil'];
	}

	public function getRegimInaltime() {
			return $this->fields['regim_inaltime'];
	}

	public function getNrGaraje() {
			return $this->fields['nr_garaje'];
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
