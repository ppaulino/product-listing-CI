<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Listing</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1>Optional Assignment: Product Listing</h1>
		<h2>Trader's Store</h2>
		<h3>Product Listing</h3>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Manufacturer</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Date Added</th>
					<th colspan="2">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $product) { ?>
					<tr>
						<td><?= $product['manufacturer_name'] ?></td>
						<td><a href="/main/edit/<?= $product['id'] ?>"><?= $product['name'] ?></td>
						<td><?= $product['price'] ?></td>
						<td><?= $product['created_at'] ?></td>
						<td>
							<form action="/main/edit/<?= $product['id'] ?>" method="post">
								<input class="btn btn-default" type="submit" value="Edit">
							</form>
						</td>
						<td>
							<form action="/main/delete/<?= $product['id'] ?>" method="post">
								<input class="btn btn-danger" type="submit" value="Delete">
							</form>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

		<h3>Add a Product</h3>
		<form action="/main/create" method="post">
			<label>Manufacturer/Brand:</label><br>
			<select name="manufacturer" class="form-control">
 				<option value="select">Select a Brand</option>
				<?php foreach ($manufacturers as $manufacturer) {?>
				<option value="<?=$manufacturer['id']?>"><?= $manufacturer['manufacturer_name'] ?></option>	
				<?php }?>
			</select><br>
			<label>Product Name:</label><input type="text" name="product_name" class="form-control input-md"><br>
			<label>Price ($):</label><input type="text" name="price" class="form-control input-md"><br>
			<label>Description:</label><textarea name="description" class="form-control"></textarea><br>
			<input class="btn btn-default" type="submit" value="Add">
		</form>
    </div>
</body>
</html>