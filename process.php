<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/secure.php');


use App\DB\Inventories\Apartments;
use Valitron\Validator;

$validator = new Validator($_REQUEST);
// dd($_REQUEST);
$validator->rule('required', ['name']);

if($validator->validate()) {
    $inventory = new Apartments();

	$inventory->createApartment($_REQUEST);

	header('Location: apartments.php');
} else {
    // Errors
    // dd($validator->errors());
    header('Location: create.php');
}