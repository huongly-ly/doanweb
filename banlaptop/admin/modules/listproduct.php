<?php 
$sqlSelect ="SELECT tbl_user.id_user,tbl_user.fullName,tbl_user.username,tbl_user.phone,tbl_user.email,tbl_user.birthday,tbl_user.gioitinh,tbl_tinhtp.name,tbl_user.address,tbl_user.avatar,tbl_user.dateCreate,tbl_user.role";
$sqlSelect .=" FROM tbl_user INNER JOIN tbl_tinhtp";
$sqlSelect .=" WHERE tbl_user.id_tinhtp = tbl_tinhtp.matp GROUP BY tbl_tinhtp.name ORDER BY tbl_user.id_user ASC ";
$result = mysqli_query($conn,$sqlSelect);
?>
<section class="wrapper" style="margin-left: -10px; width: auto; height: auto;">
  <div class="" style="height: auto;width: auto;">
   <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách User
   </div>
   <div>
    <table class="table table-hover" style="width: inherit;">
      <tr>
        <th>#</th>
        <th>Full Name</th>
        <th>User Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th>Province</th>
        <th>Address</th>
        <th>Avata</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
      <tr align="center">
        <a href="admin.php?module=gg">Thêm</a>
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
            $temDate = strtotime($row["birthday"]);
            echo date("d-m-Y",$temDate);
            ?>
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
            <?= $row["name"]?>
          </td>
          <td>
            <?= $row["address"]?>
          </td>
          <td>
            <?= $row["avatar"]?>
          </td>
          <td>
            <?= ($row["role"])?"admin":"guest"?>
          </td>
          <td>
            <a href="admin.php?module=addUser&id=<?php echo $row["id_user"] ?>">Sửa</a>
            <a href="admin.php?module=deluser&id=<?php echo $row["id_user"] ?>" onclick="return confirm('Bạn có thật sự muốn xóa không')">Xóa</a>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>
</section>