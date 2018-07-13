<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/secure.php');

use App\DB\Inventories\Categories;

$inventory = new Categories();

$categories = $inventory->all();

dd($categories);

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
		<form action="process.php" class="form-horizontal" method="post">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Details</label>
				<div class="col-sm-10">
					<textarea name="details" class="form-control"></textarea>
				</div>
			</div>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Characteristics</label>
				<div class="col-sm-12">
		        	<div class="col-sm-6">
		            	<table class="table table-condensed">
			                <tr>
			                  <th>Nr. camere</th>
			                  <td></td>
			                </tr>
			                <tr>
			                  <th>Suprafata utila:</th>
			                  <td></td>
			                </tr>
			                <tr>
			                  <th>Compartimentare:</th>
			                  <td></td>
			                </tr>
			                <tr>
			                  <th>Confort:</th>
			                  <td></td>
			                </tr>
			                <tr>
			                  <th>Etaj:</th>
			                  <td></td>
			                </tr>
			                <tr>
			                  <th>Nr. bai:</th>
			                  <td></td>
			                </tr>
		            	</table>
		        	</div>
		        	<div class="col-sm-6">
		            	<table class="table table-condensed">
			                <tr>
			                  <th>An constructie:</th>
			                  <td></td>
			                </tr>
			                <tr>
			                  <th>Structura rezistenta:</th>
			                  <td></td>
			                </tr>
			                <tr>
			                  <th>Lift</th>
			                  <td></td>
			                </tr>
			                <tr>
			                  <th>Tip imobil:</th>
			                  <td></td>
			                </tr>
			                <tr>
			                  <th>Regim inaltime:</th>
			                  <td></td>
			                </tr>
			                <tr>
			                  <th>Nr. garaje:</th>
			                  <td></td>
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
														<input type="text" name="specifications[<?php echo $specification->getId(); ?>]"/>
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
				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
							<input type="text" name="image1" class="form-control" placeholder="Url"/>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
							<input type="text" name="image2" class="form-control" placeholder="Url"/>
						</div>
					</div>			
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
							<input type="text" name="image3" class="form-control" placeholder="Url"/>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
							<input type="text" name="image4" class="form-control" placeholder="Url"/>
						</div>
					</div>			
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
							<input type="text" name="image5" class="form-control" placeholder="Url"/>
						</div>
					</div>			
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
							<input type="text" name="image6" class="form-control" placeholder="Url"/>
						</div>
					</div>			
				</div>
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
