<?php 
$id=1;
$Sel_edit = "SELECT * FROM tbl_slideshow where id = $id";
$rs_edit = mysqli_query($conn,$Sel_edit);
$row_edit = mysqli_fetch_array($rs_edit); ?>
<section class="wrapper">
  <div class="panel-heading">
    Sửa Slideshow
 </div>
 <form action="" class="form-horizontal form-material" method="post" enctype="multipart/form-data">
    <label class="col-md-8">Ảnh Slide</label>
    <div class="col-md-8">
    Ảnh 1: <img src="../upload/<?php echo $row_edit["img1"];?>" width="250" height="150"> <input class="form-control form-control-line" type="file" name="img1" id="img1"><br>
    Ảnh 2: <img src="../upload/<?php echo $row_edit["img2"];?>" width="250" height="150"> <input class="form-control form-control-line" type="file" name="img2" id="img2" ><br>
    Ảnh 3: <img src="../upload/<?php echo $row_edit["img3"];?>" width="250" height="150"> <input class="form-control form-control-line" type="file" name="img3" id="img3" >
    </div>
    <div class="col-md-8" align="center">
      <button type="submit" name="sua" id="sua">Cập nhật</button>
    </div>
  </div>
</form>
<br><br><br><br><br>
</section> 
<?php 


if (isset($_POST["sua"])) {

          if (isset($_FILES["img1"]["name"])) {
            
            if ($_FILES["img1"]["type"]=="image/jpeg" || $_FILES["img1"]["type"]=="image/png" || $_FILES["img1"]["type"]=="image/gif") {
                $anh1 ="slideshow/".$_FILES["img1"]["name"];
                move_uploaded_file($_FILES['img1']['tmp_name'],"../upload/slideshow/".$_FILES["img1"]["name"]); 
 
            }else {
              $anh1 =$row_edit['img1'];
            }
          }
        
          if (isset($_FILES["img2"]["name"])) {
            
            if ($_FILES["img2"]["type"]=="image/jpeg" || $_FILES["img2"]["type"]=="image/png" || $_FILES["img2"]["type"]=="image/gif") {
                $anh2 ="slideshow/".$_FILES["img2"]["name"];
                move_uploaded_file($_FILES['img2']['tmp_name'],"../upload/slideshow/".$_FILES["img2"]["name"]); 
 
            }else {
              $anh2 =$row_edit['img2'];
            }
          }

           if (isset($_FILES["img3"]["name"])) {
            if ($_FILES["img3"]["type"]=="image/jpeg" || $_FILES["img3"]["type"]=="image/png" || $_FILES["img3"]["type"]=="image/gif") {
                $anh3 ="slideshow/".$_FILES["img3"]["name"];
                move_uploaded_file($_FILES['img3']['tmp_name'], "../upload/slideshow/".$_FILES["img3"]["name"]);
            }else {
              $anh3 =$row_edit['img3'];
            }
          }
$Update = "UPDATE tbl_slideshow SET `img1`='$anh1',`img2`='$anh2',`img3`='$anh3' WHERE 1";
//var_dump($Update);
mysqli_query($conn,$Update);
echo "<script>alert('Update thành công!'); window.location.href='admin.php?module=editslideshow'</script>";

}


?>