<?php 
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$sqlUp="UPDATE `tbl_oder` SET `status`=0 WHERE oder=$id";
	mysqli_query($conn,$sqlUp);
	header("location:admin.php?module=quanlydonhang");
}
 ?>