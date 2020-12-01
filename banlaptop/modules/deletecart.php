<?php  
	if(isset($_GET["id"])){
		if(isset($_SESSION["cart"])){
			$cart = $_SESSION["cart"];
			unset($cart[$_GET["id"]]);
			$_SESSION["cart"] = $cart;
		}
	}
?>