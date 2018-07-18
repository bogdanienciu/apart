<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/secure.php');

use App\DB\Inventories\Apartments;

$inventory = new Apartments();

$inventory->update($_REQUEST['id'], [
	'name' => $_REQUEST['name'],
	'details' => $_REQUEST['details'],
	'nr_camere' => $_REQUEST['nr_camere'],
	'suprafata_utila' => $_REQUEST['suprafata_utila'],
	'compartimentare' => $_REQUEST['compartimentare'],
	'confort' => $_REQUEST['confort'],
	'etaj' => $_REQUEST['etaj'],
	'nr_bai' => $_REQUEST['nr_bai'],
	'an_constructie' => $_REQUEST['an_constructie'],
	'structura_rezistenta' => $_REQUEST['structura_rezistenta'],
	'lift' => $_REQUEST['lift'],
	'tip_imobil' => $_REQUEST['tip_imobil'],
	'regim_inaltime' => $_REQUEST['regim_inaltime'],
	'nr_garaje' => $_REQUEST['nr_garaje'],
]);

header('Location: apartments.php');
