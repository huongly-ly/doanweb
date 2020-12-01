<?php 
		$result = mysqli_query($conn, 'select count(id_sp) as total from tbl_sp');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total']; 
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 12;
         $total_page = ceil($total_records / $limit);
          if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
         $start = ($current_page - 1) * $limit;


?>

<div class="tabs-category clearfix">
	<div class="tab-content clearfix container">
		<div class="tabs-title">
			<div id="" class="tab-title">
				<h3>
					<span>DANH SÁCH SẢN PHẨM </span>
				</h3>
			</div>
		</div>
	</div>
</div>
<div class="container female">
	<div class="row pTB" >
		<?php 
				$sql_product = "SELECT * FROM tbl_sp LIMIT $start, $limit";
				$sql_query = mysqli_query($conn,$sql_product);
				while ($sql_row = mysqli_fetch_assoc($sql_query)) {
					
		 ?>
			<div class="col-md-3 col-sm-6 ">
				<div class="products">
				<?php if($sql_row["sale"]!=0){?>
				<div class="offer"><?php echo $sql_row["sale"]."%"; ?></div>
				<?php } ?>
					<div class="thumbnail"><a href="index.php?view=info_product&id=<?php echo $sql_row['id_sp'] ?>"><img style="width: 225px; height: 225px;" src="<?php echo "upload/imgproduct/".$sql_row["img1"]; ?>" alt="Product Name"></a></div>
					<div class="productname"><?php 	echo $sql_row['name_sp'] ?></div>
					<h4 class="price"><?php 
				 $price=$sql_row["gia_sp"];	
                $sale=$sql_row["sale"];
                $price_sale=$price - $price*$sale/100;
               
                echo number_format("$price_sale",0,",",".");
            echo " VNĐ .";
            ?></h4>
				
               
                
                
					<div class="button_group" style="margin-bottom: 2px;">
						<button class="button " type="button" onclick="addCart(<?php echo $sql_row["id_sp"]; ?>)">
							<span class="glyphicon glyphicon-shopping-cart"></span>Thêm vào giỏ hàng</button>
					</div>
				</div>
			</div>
			<?php } ?>
	</div>
	<div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
</div>