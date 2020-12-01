<?php 
		if (isset($_GET["id"])) {
			$id=$_GET['id']; 
			$sqlDel = "DELETE FROM tbl_tin WHERE id_tin=$id";
			mysqli_query($conn,$sqlDel) or die("loi");
			header("location:admin.php?module=quanlytintuc");
		 } 
	
?>