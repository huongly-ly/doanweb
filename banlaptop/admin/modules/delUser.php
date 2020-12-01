<?php 
		if (isset($_GET["id"])) {
			$id=$_GET['id'];
			$sqlDel = "DELETE FROM tbl_user WHERE id_user=$id";
			mysqli_query($conn,$sqlDel) or die("loi");
		

			header("location:admin.php?module=listUser");
		 } 
	
?>