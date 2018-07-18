<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/secure.php');

use App\DB\Inventories\Apartments;

$inventory = new Apartments();

$inventory->update($_REQUEST['id'], $_REQUEST);

header('Location: apartments.php');
