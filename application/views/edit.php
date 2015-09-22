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
		<a href="/main">Go to Product Listing</a>
		<h3><?= $products['name'] ?></h3>
		<form action="/main/update/<?= $products['id'] ?>" method="post">
			<label>Manufacturer/Brand:</label><br>
			<select name="manufacturer" class="form-control">
				<?php foreach ($manufacturers as $manufacturer) {?>
				<option value="<?=$manufacturer['id']?>"><?= $manufacturer['manufacturer_name'];?></option>	
				<?php }?>
			</select><br>
			<label>Product Name:</label><input type="text" value="<?= $products['name'] ?>" name="product_name" class="form-control input-md"><br>
			<label>Price ($):</label><input type="text" value="<?= $products['price'] ?>"name="price" class="form-control input-md"><br>
			<label>Description:</label><input type="text" value="<?= $products['description'] ?>"name="description" class="form-control"></input><br>
			<input class="btn btn-default" type="submit" value="Update">
		</form><br>
		<form action="/main/delete/<?= $products['id'] ?>" method="post">
			<input class="btn btn-danger" type="submit" value="Delete">
		</form>
    </div>
</body>
</html>