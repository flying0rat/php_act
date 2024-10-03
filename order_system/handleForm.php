<?php

session_start();

if(isset($_GET['submitBtn'])) {
	
	$order = $_GET['order'];
	$quantity = $_GET['quantity'];
	$cash = $_GET['cash'];
	
	$total = $order * $quantity;
	$change = abs($total - $cash);
	
	echo(
	"<div style='border: 1px dotted black;font-family: arial;'>
		<h1 style='text-align: center;'>RECEIPT</h1>
		<h1>Total Price: " . $total . "</h1>
		<h1>You Paid: " . $cash . "</h1>
		<h1>CHANGE: " . $change . "</h1>
		<h1>" . date("m/d/y h:i:s a") . "</h1>
	</div>"
	);
}

?>