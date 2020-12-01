<?php 
    $email=$_SESSION['username']['email'];
    $sqlSelect ="SELECT * FROM tbl_oder WHERE email LIKE '%$email%' ORDER BY dateOder DESC ";
    $result = mysqli_query($conn,$sqlSelect);
        //Kiểm tra user và email
    $num=mysqli_num_rows($result);


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
                <h1 class="title"><span>Lịch sử mua hàng</span></h1>
                <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                 <table class=" table-hover" style="width: inherit;">
                  <tr>
                    <th>#</th>
                    <th>Khách hàng</th>
                    <th>Phone</th>
                    <th width="300">Địa chỉ nhận hàng</th>
                    <th>Ngày đặt</th>
                    <th>PTVC</th>
                    <th>PTTT</th>
                    <th>Tổng tiền</th>
                    <th>Status</th>
                </tr>
                <?php  
                $i=0;
                if ($num!=1) {
                    
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $i++;
                    $dateOder=date_create($row['dateOder']);
                    ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td align="center">
                        <?= $row["fullName"]?>
                    </td>
                    <td>
                        <?= $row["phone"]?>
                    </td>
                    <td width="300" style="overflow: hidden;">
                        <?= $row["address"]?>
                    </td>
                    <td>
                        <?php 
                        echo date_format($dateOder,"H:i:s d/m/Y"); ?>
                    </td>
                    <td>
                        <?php 
                        if($row["ptvc"]==1){
                          echo "Giao hàng tận nhà";
                      }else{
                          echo "Nhận tại cửa hàng";
                      }
                      ?>
                  </td>
                  <td>
                    <?php 
                    if($row["pttt"]==1){
                      echo "Tiền mặt";
                  }else{
                      echo "Chuyển khoản";
                  }
                  ?>
              </td>
              <td>
                <?php echo number_format($row['tongTien'])." vnđ";?>
            </td>
            <td>
                <?php if($row["status"]==1){
                  echo "Đặt hàng";
              }else{
                  echo "Xong";
              }?>
          </td>
          <td>
            <a href="?view=chitiet&id=<?php echo $row["oder"] ?>">Chi tiết</a>
        </td>
    </tr>
    <?php } }else {
        
     ?>
     <td colspan="10">
           Bạn chưa mua sản phẩm nào
          </td>
          <?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>