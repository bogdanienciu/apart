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
		return $this->fields['nrcamere'];
	}


}
