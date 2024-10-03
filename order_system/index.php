<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order System</title>
	<style>
		table, th, td {
			width: 200px;
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<?php session_start(); ?>
	
	<h1>Menu</h1>
	
	<table>
		<tr>
			<th>Order</th>
			<th>Amount</th>
		</tr>
		<tr>
			<td>Burger</td>
			<td>50</td>
		</tr>
		<tr>
			<td>Fries</td>
			<td>75</td>
		</tr>
		<tr>
			<td>Steak</td>
			<td>150</td>
		</tr>
	</table>
	<br>
	<form action="handleForm.php" method="GET">
		<label for="order">Select an order</label>
		<select name="order">
			<option value=50>Burger</option>
			<option value=75>Fries</option>
			<option value=150>Steak</option>
		</select>
		<p>Quantity <input type="number"  name="quantity"></p>
		<p>Cash <input type="number"  name="cash"></p>
		<p><input type="submit" value="Submit" name="submitBtn"></p>
	</form>
</body>
</html>