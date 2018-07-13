<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/secure.php');

use App\DB\Inventories\Apartments;

$inventory = new Apartments();

$apartments = $inventory->all();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Apartments</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>
						<a href="create.php">Create</a>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($apartments as $apartment): ?>
					<tr>
				    	<td><?php echo $apartment->getID(); ?></td>
				    	<td><?php echo $apartment->getName(); ?></td>
				    	<td><a href="edit.php?id=<?php echo $apartment->getID(); ?>">Edit</a></td>
				    	<td><a href="delete.php?id=<?php echo $apartment->getID(); ?>">Delete</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>  
		</table>
	</div>
</body>
</html>
