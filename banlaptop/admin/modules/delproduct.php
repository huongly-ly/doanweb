	<?php 
		if (isset($_GET["id"])) {
			$sqlDel = "DELETE FROM tbl_sp WHERE id_sp=".$_GET["id"];
			mysqli_query($conn,$sqlDel) or die("loi");

			header("location:admin.php?modules=manage_product");
		 } 
	
?>