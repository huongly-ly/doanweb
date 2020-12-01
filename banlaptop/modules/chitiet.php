<?php 
    $id=$_GET['id'];
$sqlSelect ="SELECT * FROM tbl_oderdetail WHERE oder_id=$id ";
$result = mysqli_query($conn,$sqlSelect);
$rs=mysqli_num_rows($result);
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="menu-account">
                <h3>
                    <span>
                        Tài khoản
                    </span>
                </h3>
                <ul>
                    <li><a href="index.php?view=info_user"><i class="fa fa-user-circle-o"></i>Thông tin tài khoản</a></li>
                    <li><a href="index.php?view=ttdh"><i class="fa fa-key"></i>Lịch sử mua hàng</a></li>
                    <li><a href="index.php?view=changepass"><i class="fa fa-key"></i>Quên mật khẩu</a></li>
                </ul>
            </div>                    
        </div>
        <div class="col-md-9">
            <div class="register-content clearfix ng-scope">
                <h1 class="title"><span>Chi tiết hóa đơn</span></h1>
                <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                 <table class="table table-hover" style="width: inherit;">
      <tr>
        <th>#</th>
        <th>Tên sản phẩm</th>
        <th>Chi tiết sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Thành tiền</th>
      </tr>
      <?php  
      $i=0;
      if($rs!=0){
      while ($row = mysqli_fetch_assoc($result)) {
        $i++;
        $totals=0;
        ?>
        <tr>
          <td><?= $i ?></td>
          <td>
            <?= $row["name_sp"]?>
          </td>
          <td>
            <a href="?view=info_product&id=<?php echo $row['id_sp'] ?>"  target="_blank">Xem</a>
          </td>
          <td>
            <?= $row["sl"]?>
          </td>
          <td style="overflow: hidden;">
            <?php $price=$row['gia_sp'];
            echo number_format($price); ?>
          </td>
          <td>
            <?php 
            $thanhtien=$row['tong_tien'];
            echo number_format($thanhtien);
            $totals+=$thanhtien;
             ?>
          </td>
          
        </tr>
        <?php }?>
        <tr>
          <td colspan="5">Tổng tiền</td>
          <td><?php echo number_format($totals); ?></td>
        </tr>
        <?php }else {
          echo "Lỗi nhập liệu!";
        } ?>
        
      </table>
</div>
</div>
</div>
</div>
</div>