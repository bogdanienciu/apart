<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/secure.php');

use App\DB\Inventories\Apartments;
use App\DB\Inventories\Categories;

$apartmentInventory = new Apartments();

$apartment = $apartmentInventory->find($_REQUEST['id']);
// dd($apartment);
$apartmentPictures = $apartment->getApartmentPictures();
// dd($apartmentPictures);

$categoriesInventory = new Categories();

$categories = $categoriesInventory->all();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Forms</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form action="update.php?id=<?php echo $apartment->getId(); ?>" class="form-horizontal" method="post">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" value="<?php echo $apartment->getName(); ?>"/>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Details</label>
				<div class="col-sm-10">
					<textarea name="details" class="form-control"><?php echo $apartment->getDetails(); ?></textarea>
				</div>
			</div>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Characteristics</label>
				<div class="col-sm-12">
		        	<div class="col-sm-6">
		            	<table class="table table-condensed">
			                <tr>
			                  <th>Nr. camere</th>
			                  <td><input type="text" name="nr_camere" class="form-control" value="<?php echo $apartment->getNrCamere(); ?>"/></td>
			                </tr>
			                <tr>
			                  <th>Suprafata utila:</th>
			                  <td><input type="text" name="suprafata_utila" class="form-control" value="<?php echo $apartment->getSuprafataUtila(); ?>"/></td>
			                </tr>
			                <tr>
			                  <th>Compartimentare:</th>
			                  <td><input type="text" name="compartimentare" class="form-control" value="<?php echo $apartment->getCompartimentare(); ?>"/></td>
			                </tr>
			                <tr>
			                  <th>Confort:</th>
			                  <td><input type="text" name="confort" class="form-control" value="<?php echo $apartment->getConfort(); ?>"/></td>
			                </tr>
			                <tr>
			                  <th>Etaj:</th>
			                  <td><input type="text" name="etaj" class="form-control" value="<?php echo $apartment->getEtaj(); ?>"/></td>
			                </tr>
			                <tr>
			                  <th>Nr. bai:</th>
			                  <td><input type="text" name="nr_bai" class="form-control" value="<?php echo $apartment->getNrBai(); ?>"/></td>
			                </tr>
		            	</table>
		        	</div>
		        	<div class="col-sm-6">
		            	<table class="table table-condensed">
			                <tr>
			                  <th>An constructie:</th>
			                  <td><input type="text" name="an_constructie" class="form-control" value="<?php echo $apartment->getAnConstructie(); ?>"/></td>
			                </tr>
			                <tr>
			                  <th>Structura rezistenta:</th>
			                  <td><input type="text" name="structura_rezistenta" class="form-control" value="<?php echo $apartment->getStructuraRezistenta(); ?>"/></td>
			                </tr>
			                <tr>
			                  <th>Lift</th>
			                  <td><input type="text" name="lift" class="form-control" value="<?php echo $apartment->getLift(); ?>"/></td>
			                </tr>
			                <tr>
			                  <th>Tip imobil:</th>
			                  <td><input type="text" name="tip_imobil" class="form-control" value="<?php echo $apartment->getTipImobil(); ?>"/></td>
			                </tr>
			                <tr>
			                  <th>Regim inaltime:</th>
			                  <td><input type="text" name="regim_inaltime" class="form-control" value="<?php echo $apartment->getRegimInaltime(); ?>"/></td>
			                </tr>
			                <tr>
			                  <th>Nr. garaje:</th>
			                  <td><input type="text" name="nr_garaje" class="form-control" value="<?php echo $apartment->getNrGaraje(); ?>"/></td>
			                </tr>
		            	</table>
		        	</div>
        		</div>
			</div>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Specification</label>

				<div class="col-sm-10">
					<div class="row">
						<?php foreach ($categories as $category): ?>
							<div class="col-sm-6">
								<h3 class="subtitle"><?php echo $category->getName(); ?></h3>
								<div class="row">
									<div class="row">
										<?php foreach ($category->getSpecifications() as $specification): ?>
											<div class="col-sm-12">
												<div class="form-group">
													<label for="inputEmail3" class="col-sm-6 control-label"><?php echo $specification->getName(); ?></label>
													<div class="col-sm-6">
													<input type="text" name="specifications[<?php echo $specification->getId(); ?>]" value="<?php echo $apartment->getSpecificationValue($specification->getId()); ?>"/>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
	</div>
		
	<div class="row">
		<?php for ($i = 0; $i < 10; $i++): ?>
			<?php
				$url = '';

				if (isset($apartmentPictures[$i])) {
					$url = $apartmentPictures[$i]->getUrl();
				}
			?>

			<div class="col-sm-6">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
					<div class="col-sm-10">
						<input type="text" name="image<?php echo $i; ?>" class="form-control" value="<?php echo $url; ?>"/>
					</div>
				</div>
			</div>
		<?php endfor; ?>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default active">Submit</button>
		</div>
	</div>

	</form>
</div>
</body>
</html>
