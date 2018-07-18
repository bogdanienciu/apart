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
				'nr_camere' => $fields['nr_camere'],
				'suprafata_utila' => $fields['suprafata_utila'],
				'compartimentare' => $fields['compartimentare'],
				'confort' => $fields['confort'],
				'etaj' => $fields['etaj'],
				'nr_bai' => $fields['nr_bai'],
				'an_constructie' => $fields['an_constructie'],
				'structura_rezistenta' => $fields['structura_rezistenta'],
				'lift' => $fields['lift'],
				'tip_imobil' => $fields['tip_imobil'],
				'regim_inaltime' => $fields['regim_inaltime'],
				'nr_garaje' => $fields['nr_garaje'],

			]
		);
		
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

	public function find($id) {
		// Aduce randul din baza de date (ca si un array cu key, value) unde id-ul este ceea ce primesc ca si parametru la functie ($id)
		$row = $this->mysql->first('SELECT * FROM apartments where id = ?', [$id]);
		// dd($row);
		$apartment = new Apartment($row);

		// Aduce toate randurile din baza de date (ca si un array, unde fiecare element este un array cu key, value)
		$categories = $this->mysql->select('SELECT categories.id, categories.name 			/* */ 
			FROM categories
			INNER JOIN specifications on specifications.category_id = categories.id
			INNER JOIN apartment_specifications ON apartment_specifications.specification_id = specifications.id
			where apartment_id = ?
			GROUP BY categories.id', [$apartment->getId()]
		);

		// Ii zicem apartamentului sa isi seteze categoriile
		$apartment->setSpecificationCategories($categories);

		// Pentru fiecare categorie care este atasata apartamentului
		foreach ($apartment->getSpecificationCategories() as $category) {
			// Aduce toate randurile din baza de date (ca si un array, unde fiecare element este un array cu key, value)
			$specifications = $this->mysql->select('SELECT specifications.id, specifications.name, apartment_specifications.value
				FROM `apartment_specifications`
				INNER JOIN specifications on specifications.id = apartment_specifications.specification_id
				where
					apartment_id = ?
					and category_id = ?', [$apartment->getId(), $category->getId()]
			);

			// Ii zice categoriei sa isi seteze specificatiile
			$category->setSpecifications($specifications);
		}

		$apartment_pictures = $this->mysql->select('SELECT apartment_pictures.id, apartment_pictures.url
			FROM `apartment_pictures`
			where apartment_id = ?', [$apartment->getId()]);

		$apartment->setApartmentPictures($apartment_pictures);

		// Returneaza apartamentul pe care l-am construit mai sus
		return $apartment;
	}

	public function update($id, $fields) {
		$this->mysql->update('apartments', $id, $fields);
	}

	public function delete($id) {
		$this->mysql->delete('apartments', $id);
	}
}