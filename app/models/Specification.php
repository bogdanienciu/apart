<?php
namespace App\Models;

/**
 * 
 */
class Specification extends Model
{
	public function getValue() {
		return $this->fields['value'];
	}

}
