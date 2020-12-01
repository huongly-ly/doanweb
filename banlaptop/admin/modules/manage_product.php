<?php 
  
  $sqlSelect ="SELECT tbl_sp.*,tbl_loaisp.name_loaisp,tbl_hangsx.name_hangsx FROM tbl_hangsx , tbl_loaisp ,tbl_sp WHERE tbl_loaisp.id_loaisp = tbl_sp.id_loaisp AND tbl_sp.id_hangsx = tbl_hangsx.id_hangsx GROUP BY tbl_sp.id_sp";
  $result = mysqli_query($conn,$sqlSelect);
 ?>
<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sản phẩm
    </div>
    <div class="row w3-res-tb">
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th width="80">Tên sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Hãng sản xuất</th>
            <th>Ảnh sản phẩm</th>
            <th>Status</th>
            <th>Sale</th>
            <th>Giá</th>
            <th>Giá sale</th>
            <th>Action</th>
          </tr>
          </tr>
      <?php  
      $i=0;
      while ($row = mysqli_fetch_assoc($result)) {
        $i++;
        ?>
        <tr height="100">
          <td><?= $i ?></td>
          <td>
            <?= $row["name_sp"]?>
          </td>
          <td>
            <?= $row["name_loaisp"]?>
          </td>
          <td>
            <?= $row["name_hangsx"]?>
          </td>
         <td>
           <img src="../upload/imgproduct/<?php echo $row["img1"];?>" width="60" height="60">
           <img src="../upload/imgproduct/<?php echo $row["img2"];?>" width="60" height="60">
           <img src="../upload/imgproduct/<?php echo $row["img3"];?>" width="60" height="60">
          </td>
          <td>
            <?php 
              if($row["status"]==1){
               echo "Còn hàng";
             }else{
              echo "Hết hàng";
            } ?>
          </td>
          <td>
            <?= $row["sale"]."%"?>
          </td>
          <td>
            <?= number_format($row["gia_sp"])." vnđ"?>
          </td>
          <td>
            <?php 
              $price=$row["gia_sp"];
              $sale = $row["sale"];
              $price_sale=$price - ($price*($sale/100));
              echo number_format($price_sale)." vnđ";
             ?>
          </td>
          <td>
            <a href="admin.php?module=editproduct&id=<?php echo $row["id_sp"] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a style="float: right;" href="admin.php?module=delproduct&id=<?php echo $row["id_sp"] ?>" onclick="return confirm('Bạn có thật sự muốn xóa không')"><i class="fa fa-times" aria-hidden="true"></i></i></a>
          </td>
        </tr>
        <?php } ?>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>