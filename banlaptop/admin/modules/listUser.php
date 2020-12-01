<?php 
$sqlSelect ="SELECT * FROM tbl_user  ORDER BY id_user ASC ";
$result = mysqli_query($conn,$sqlSelect);

?>
<section class="wrapper" style="margin-left: -10px; width: auto; height: auto;">
  <div class="" style="height: auto;width: auto;">
   <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách User
   </div>
   <div>
    <table class="table table-hover" ">
      <tr>
        <th>#</th>
        <th>Full Name</th>
        <th>User Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
      
      <?php  
      $i=0;
      while ($row = mysqli_fetch_assoc($result)) {
        $i++;
        ?>
        <tr>
          <td><?= $i ?></td>
          <td>
            <?= $row["fullName"]?>
          </td>
          <td>
            <?= $row["username"]?>
          </td>
          <td>
            <?= $row["phone"]?>
          </td>
          <td style="overflow: hidden;">
            <?= $row["email"]?>
          </td>
          
          <td>
            <?php 
            if($row["gioitinh"]==1){
              echo "Nam";
            }else{
              echo "Nữ";
            }
            ?>
          </td>
          <td>
            <?= $row["address"]?>
          </td>
          <td>
            <?php if($row["role"]==1)
			{
				echo"Supper Admin";
			} elseif ($row["role"]==2) 
			{echo"Sub Admin";
              # code...
            }else {
              echo"Guest";
            } ?>
          </td>
          <td>
          <?php if (isset($_SESSION['username'])&&$_SESSION['username']['role']==1&&$row['role']!=1) {

             ?>
            <a href="admin.php?module=editUser&id=<?php echo $row["id_user"] ?>">Sửa</a>
            <a href="admin.php?module=delUser&id=<?php echo $row["id_user"] ?>" onclick="return confirm('Bạn có thật sự muốn xóa không')">Xóa</a>
            <?php 
          }elseif (isset($_SESSION['username'])&&$_SESSION['username']['role']==2&&$row['role']==0) {
           ?>
           <a href="admin.php?module=editUser&id=<?php echo $row["id_user"] ?>">Sửa</a>
            <a href="admin.php?module=delUser&id=<?php echo $row["id_user"] ?>" onclick="return confirm('Bạn có thật sự muốn xóa không')">Xóa</a>
           <?php
          }
             ?>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>
</section>