<?php 
if(isset($_GET['id'])) {
	$id=$_GET['id'];
	$sql="SELECT * FROM tbl_tin WHERE id_tin=$id"; 
$query=mysqli_query($conn,$sql);
} ?>
<div class="container">
<div class="col-md-8 col-md-offset-2">
	<?php while ($row=mysqli_fetch_assoc($query)) {
		?>
		<h2><?php echo $row['tieuDe']; ?></h2>
		<p><?php echo $row['noidung']; ?></p>
		<?php
	} ?>
</div>
</div>