<?php 
  
  $sqlSelect ="SELECT * FROM tbl_tin ORDER BY id_tin DESC";
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
            <th width="80">Tiêu đề</th>
            <th>Ảnh</th>
            <th>Tóm tắt</th>
            <th>Acction</th>
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
            <?= $row["tieuDe"]?>
          </td>
          <td>
            <img src="../upload/imgtin/<?php echo $row["img"];?>" width="150" height="150">
          </td>
          <td>
            <?= $row["tomtat"]?>
          </td>
          <td>
            <a href="admin.php?module=edittin&id=<?php echo $row["id_tin"] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a style="float: right;" href="admin.php?module=deltin&id=<?php echo $row["id_tin"] ?>" onclick="return confirm('Bạn có thật sự muốn xóa không')"><i class="fa fa-times" aria-hidden="true"></i></i></a>
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