<?php 
require_once(__DIR__ . '/vendor/autoload.php');

// use App\DB\MySQLReader;
use App\Models\Aparment;

// require_once('models/MySQLReader.php');
// require_once('models/Aparment.php');

$reader = new MySQLReader($_REQUEST['id'] ?? 1);

$aparment = new Aparment($reader->getFields());

$pictures = $reader->getAparmentPictures();
$profilePicture = array_shift($pictures);

// $aparment->setProfilePicture($profilePicture);
$aparment->setApartmentPictures($pictures);
$aparment->setSpecificationCategories($reader->getSpecificationCategories());

	foreach ($aparment->getCategories() as $category) {
		$category->setSpecifications($reader->getSpecifications($category->getId()));
	}
}