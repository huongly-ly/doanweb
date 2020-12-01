<?php  
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$sqlDetail = "SELECT * FROM tbl_sp WHERE id_sp =$id";
		$result = mysqli_query($conn,$sqlDetail) or die("Lỗi truy vấn");
		$data = mysqli_fetch_assoc($result);
		if(!isset($_SESSION["cart"])){
			$cart[$id] = $data;
			$cart[$id]['productQuanlity'] = 1;
		}else{
			$cart = $_SESSION["cart"];
			if(array_key_exists($id , $cart)){
				$cart[$id]['productQuanlity'] +=1;
			}else{
				$cart[$id] = $data;
				$cart[$id]['productQuanlity'] = 1;
			}
		}

		$_SESSION["cart"] = $cart;
	}
?>