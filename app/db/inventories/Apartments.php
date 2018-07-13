<?php
namespace App\DB\Inventories;

use App\DB\MySQLConnection;
use App\Models\Apartment;

/**
 */
class Apartments extends Inventory
{
	public function createApartment($fields) {
		$apartmentId = $this->mysql->insert(
			'apartments',
			[
				'name' => $fields['name'],
				'details' => $fields['details'],
			]
		);
		// dd($apartmentId);
		for ($i = 1; $i < 10; $i++) {
			if (isset($fields['image' . $i])) {
				$this->mysql->insert(
					'apartment_pictures', 
					[
						'apartment_id' =>$apartmentId,
						'url' => $fields['image' . $i]
					]
				);
			}
		}

		foreach ($fields['specifications'] as $specification_id => $value) {
			if ($value != "") {
				$this->mysql->insert(
					'apartment_specifications',
					[
						'apartment_id' => $apartmentId, 
						'specification_id' => $specification_id,
						'value' => $value
					]
				);
			}
		}

		return $apartmentId;
	}

	public function all() {
		$rows = $this->mysql->select('SELECT * FROM apartments where deleted_at is null');

		$apartments = [];

		foreach ($rows as $row) {
			$apartments[] = new Apartment($row);
		}

		return $apartments;
	}

	public function find($id) {																// 
		$row = $this->mysql->first('SELECT * FROM apartments where id = ?', [$id]);			//i-a apartamentul din 'apartments' unde id-ul ii '?'

		$apartment = new Apartment($row);													//creaza un rand nou cu id-ul apartamentului 

		$categories = $this->mysql->select('SELECT categories.id, categories.name 			/* */ 
			FROM categories
			INNER JOIN specifications on specifications.category_id = categories.id 		/* */
			INNER JOIN apartment_specifications ON apartment_specifications.specification_id = specifications.id 	/* */
			where apartment_id = ?
			GROUP BY categories.id', [$apartment->getId()]
		);

		$apartment->setSpecificationCategories($categories);

		foreach ($apartment->getSpecificationCategories() as $category) {
			$specifications = $this->mysql->select('SELECT specifications.id, specifications.name, apartment_specifications.value
				FROM `apartment_specifications`
				INNER JOIN specifications on specifications.id = apartment_specifications.specification_id
				where
					apartment_id = ?
					and category_id = ?', [$apartment->getId(), $category->getId()]
			);

			$category->setSpecifications($specifications);
		}

		return $apartment;
	}

	public function update($id, $fields) {
		$this->mysql->update('apartments', $id, $fields);
	}

	public function delete($id) {
		$this->mysql->delete('apartments', $id);
	}
}