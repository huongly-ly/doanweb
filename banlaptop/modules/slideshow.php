<?php 
	$sql_img = "SELECT * FROM tbl_slideshow ";
	$sql_query = mysqli_query($conn,$sql_img);
	$sql_row = mysqli_fetch_assoc($sql_query);
 ?>
<div class="container">
<div class="row">
	<div class="col-md-12" >
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img style="width: 1150px; height: 431.25px" src="<?php echo "upload/".$sql_row["img1"]; ?>" >
				</div>

				<div class="item">
					<img  style="width: 1150px; height: 431.25px" src="<?php echo "upload/".$sql_row["img2"]; ?>" >
				</div>

				<div class="item">
					<img style="width: 1150px; height: 431.25px" src="<?php echo "upload/".$sql_row["img3"]; ?>" >
				</div>
                <div class="item">
					<img style="width: 1150px; height: 431.25px" src="<?php echo "upload/".$sql_row["img4"]; ?>" ">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>

		</div>
	</div>
</div>
</div>




