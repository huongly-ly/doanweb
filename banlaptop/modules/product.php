<div class="tabs-category clearfix">
	<div class="tab-content clearfix container">
		<div class="tabs-title">
			<div id="" class="tab-title">
				<h3>
					<span>DANH SÁCH SẢN PHẨM</span>
				</h3>
			</div>
		</div>
	</div>
</div>
<div class="container female">
	<div class="row pTB" >
		<?php 
				$id=isset($_GET["id"]) ? $_GET["id"] : 0;
				$id_hang=isset($_GET["id_hang"]) ? $_GET["id_hang"] : 0 ;
				$sql_product = "SELECT * FROM tbl_sp WHERE id_loaisp = $id AND id_hangsx = $id_hang";
				$sql_query = mysqli_query($conn,$sql_product);
				$count=mysqli_num_rows($sql_query);
				if ($count!=0) {
					while ($sql_row = mysqli_fetch_assoc($sql_query)) {
				
				
					
		 ?>
			<div class="col-md-3 col-sm-6 ">
				<div class="products"><?php if($sql_row["sale"]!=0){?>
				<div class="offer"><?php echo $sql_row["sale"]."%"; ?></div><?php } ?>
					
					<div class="thumbnail"><a href="index.php?view=info_product&id=<?php echo $sql_row['id_sp'] ?>"><img style="width: 225px; height: 225px;" src="<?php echo "upload/imgproduct/".$sql_row["img1"]; ?>" alt="Product Name"></a></div>
					<div class="productname"><?php 	echo $sql_row['name_sp'] ?></div>
					<h4 class="price"><?php 
				 $price=$sql_row["gia_sp"];	
                $sale=$sql_row["sale"];
                $price_sale=$price - $price*$sale/100;
               
                echo number_format("$price_sale",0,",",".");
            echo " VNĐ .";
            ?></h4>
					<!-- <h4 class="price">220.000 VND</h4> -->
					<div class="button_group">
						<button class="button " type="button" onclick="addCart(<?php echo $sql_row["id_sp"]; ?>)">
							<span class="glyphicon glyphicon-shopping-cart"></span>Thêm vào giỏ hàng</button>
					</div>
				</div>
			</div>
			<?php } 
			}else {
				echo "Không tìm thấy sản phẩm nào!";
			}
			?>
	</div>
</div>