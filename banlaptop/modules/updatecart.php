<?php  
	if(isset($_GET["id"])){
		$sl = $_GET["sl"];
		$id=$_GET["id"];
		if(isset($_SESSION["cart"]) && $_SESSION["cart"]){
			$cart = $_SESSION["cart"];
			if(array_key_exists($id, $cart)){
				if($sl){
					$cart[$id] = array(
						"name_sp"=>$cart[$id]["name_sp"],
						"gia_sp"=>$cart[$id]["gia_sp"],
						"img1"=>$cart[$id]["img1"],
						"sale"=>$cart[$id]["sale"],
						"productQuanlity"=>$sl
					);
				}else{
					unset($cart[$id]);
				}
			}
			$_SESSION["cart"] = $cart;
		}
	}
?>