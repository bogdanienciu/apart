<?php
namespace App\Models;

class Model
{
	protected $fields;
	protected $nrcamere;

	public function __construct($fields = []) {
		$this->fields = $fields;
	}

	public function getId() {
		return $this->fields['id'];
	}

	public function getName() {
		return $this->fields['name'];
	}

	public function getNrcamere() {
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


}
