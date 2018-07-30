<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/secure.php');

use App\DB\Inventories\Apartments;
use App\DB\Inventories\Categories;

$apartmentInventory = new Apartments();

$apartment = $apartmentInventory->find($_REQUEST['id'] ?? 1);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Apartment</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="apart.css">
</head>
<body>
	<div class="container">

		<div class="row">
			<?php foreach ($apartment->getApartmentPictures() as $picture): ?>
				<div class="mySlides">
					<div class="numbertext">1 / 6</div>
					<img src="<?php echo $picture->getUrl()?>" style="width:100%">
				</div>
			<?php endforeach; ?>	

			<!-- Full-width images with number text -->

			<!-- Next and previous buttons -->
			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>

			<!-- Image text -->
			<div class="caption-container">
				<p id="caption"></p>
			</div>

			<!-- Thumbnail images -->
			<div class="col-sm-12">
				<div class="col-sm-2">
					<img class="demo cursor" src="https://image.ibb.co/eWuSgo/img01.jpg" style="width:100%" onclick="currentSlide(1)" alt="Living">
				</div>
				<div class="col-sm-2"> 
					<img class="demo cursor" src="https://image.ibb.co/jOMjST/img02.jpg" style="width:100%" onclick="currentSlide(2)">
				</div>
				<div class="col-sm-2">
					<img class="demo cursor" src="https://image.ibb.co/cnLdnT/img03.jpg" style="width:100%" onclick="currentSlide(3)">
				</div>
				<div class="col-sm-2">
					<img class="demo cursor" src="https://image.ibb.co/bsmJnT/img04.jpg" style="width:100%" onclick="currentSlide(4)">
				</div>
				<div class="col-sm-2">
					<img class="demo cursor" src="https://image.ibb.co/ioMCE8/img05.jpg" style="width:100%" onclick="currentSlide(5)">
				</div> 
				<div class="col-sm-2">
					<img class="demo cursor" src="https://image.ibb.co/gj7V1o/img06.jpg" style="width:100%" onclick="currentSlide(6)">
				</div>
			</div>
		</div>

		<div class="col-sm-12">
			<div class="col-sm-8">
				<h2>Details</h2>
				<p><?php echo $apartment->getDetails(); ?></p>
			</div>
			<div class="col-sm-4">
				<h2>Planul etajului</h2>
				<div class="col-sm-2">
					<input type=button onClick="parent.open('https://docs.wixstatic.com/ugd/ae7b6c_cadc91b0e2c84aa49adb82eb8860f6ec.pdf')" value='Floor plan' >
				</div>
			</div>
		</div>

		<div>
			<div>
				<h2>Characteristics</h2>
			</div>

			<div class="col-sm-12">
	        	<div class="col-sm-6">
	            	<table class="table table-condensed">
		                <tr>
		                  <th>Nr. camere</th>
		                  <td><?php echo $apartment->getNrCamere(); ?></td>
		                </tr>
		                <tr>
		                  <th>Suprafata utila:</th>
		                  <td><?php echo $apartment->getSuprafataUtila(); ?></td>
		                </tr>
		                <tr>
		                  <th>Compartimentare:</th>
		                  <td><?php echo $apartment->getCompartimentare(); ?></td>
		                </tr>
		                <tr>
		                  <th>Confort:</th>
		                  <td><?php echo $apartment->getConfort(); ?></td>
		                </tr>
		                <tr>
		                  <th>Etaj:</th>
		                  <td><?php echo $apartment->getEtaj(); ?></td>
		                </tr>
		                <tr>
		                  <th>Nr. bai:</th>
		                  <td><?php echo $apartment->getNrBai(); ?></td>
		                </tr>
	            	</table>
	        	</div>
	        	<div class="col-sm-6">
	            	<table class="table table-condensed">
		                <tr>
		                  <th>An constructie:</th>
		                  <td><?php echo $apartment->getAnConstructie(); ?></td>
		                </tr>
		                <tr>
		                  <th>Structura rezistenta:</th>
		                  <td><?php echo $apartment->getStructuraRezistenta(); ?></td>
		                </tr>
		                <tr>
		                  <th>Lift</th>
		                  <td><?php echo $apartment->getLift(); ?></td>
		                </tr>
		                <tr>
		                  <th>Tip imobil:</th>
		                  <td><?php echo $apartment->getTipImobil(); ?></td>
		                </tr>
		                <tr>
		                  <th>Regim inaltime:</th>
		                  <td><?php echo $apartment->getRegimInaltime(); ?></td>
		                </tr>
		                <tr>
		                  <th>Nr. garaje:</th>
		                  <td><?php echo $apartment->getNrGaraje(); ?></td>
		                </tr>
	            	</table>
	        	</div>
        	</div>

		</div>

		<div>
			<div>
				<h2>Specification</h2>
			</div>

			<div class="col-sm-12">
				<ul>
					<li>Utilitati</li>
					<li></li>
					<li class="sub-header">Finisaje</li>
					<li></li>
					<li class="sub-header">Dotari</li>
					<li></li>
					<li class="sub-header">Servicii</li>
					<li></li>
					<li class="sub-header">Alte detalii zona</li>
					<li></li>
					<li class="sub-header">Vecinatati</li>
					<li></li>
					<li class="sub-header">Disponibilitate proprietate</li>
					<li></li>
				</ul>
			</div>
		</div>

	</div>
	
	<script src="apart.js" type="text/javascript" charset="utf-8" async defer>
	</script>
</body>
</html>