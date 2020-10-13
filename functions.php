<?php
require "db.php";

function get_tour_by_id( $id ){
	global $link;

	$query = "SELECT * FROM products WHERE id=" . $id;
	$req = mysqli_query($link, $query);
	$resp = mysqli_fetch_assoc($req);

	return $resp;
}

function update_cart_sum()  { 
	$_SESSION['cart_sum']=0; 
	for ($i=0; $i<$_SESSION['cart_list']; $i++) { 
		$_SESSION['cart_sum']=$_SESSION['cart_sum'] + $_SESSION['product_price'][$i]* $_SESSION['cart_list'][$i]; 
	}
}