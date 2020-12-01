<?php 
$id = $_GET["id"];

$Sel_edit = "SELECT * FROM tbl_tin where id_tin = '$id'";
$rs_edit = mysqli_query($conn,$Sel_edit);
$row_edit = mysqli_fetch_array($rs_edit);

if(isset($_POST["editTin"])){
    $name = $_POST["name"];
    $tomtat = $_POST["tomtat"];
    $noidung = $_POST["noidung"];
    $tukhoa = $_POST["tukhoa"];


    $anh1 = "";
          if (isset($_FILES["img1"]["name"])) {
            
            if ($_FILES["img1"]["type"]=="image/jpeg" || $_FILES["img1"]["type"]=="image/png") {
                $anh1 ="upload/".$_FILES["img1"]["name"];
                move_uploaded_file($_FILES['img1']['tmp_name'],"../upload/imgtin/upload/".$_FILES["img1"]["name"]); 
 
            }else {
              $anh1 =$row_edit['img'];
            }
          }
$Update = "UPDATE tbl_tin SET `tieuDe`='$name',`img`='$anh1',`tomtat`='$tomtat',`noidung`='$noidung',`tukhoa`='$tukhoa' WHERE id_tin=$id";
mysqli_query($conn,$Update);
//var_dump($Update);
echo "<script>alert('Update thành công!'); window.location.href='admin.php?module=quanlytintuc'</script>";

}


?>
<section class="wrapper">
  <div class="panel-heading">
    Viết bài tin tức
 </div>
 <form action="" class="form-horizontal form-material" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-md-8">Tiêu đề</label>
    <div class="col-md-8">
      <input class="form-control form-control-line" placeholder="Nhập tiêu đề bài viết" type="text" name="name" id="name" value=" <?php echo $row_edit['tieuDe'] ?>">
    </div>
    <label class="col-md-8">Ảnh bài viết</label>
    <div class="col-md-8">
    <img src="./upload/imgtin/<?php echo $row_edit["img"];?>" alt="">
      <input class="form-control form-control-line"  type="file" name="img1" id="img1" value="">

    </div>
    <label class="col-md-8">Tóm tắt bài viết</label>
    <div class="col-md-8">
      <textarea id="froala-editor" name="tomtat" value="<?php echo $row_edit['tomtat'] ?>" ></textarea>
    </div>
    <label class="col-md-8">Nội dung bài viết</label>
    <div class="col-md-8">
      <textarea id="froala-editor" name="noidung" value="<?php echo $row_edit['noidung'] ?>"></textarea>
    </div>
    <label class="col-md-8">Từ khóa bài viết</label>
    <div class="col-md-8">
      <textarea id="froala-editor" name="tukhoa" value="<?php echo $row_edit['tukhoa'] ?>"></textarea>
    </div> 
    <div class="col-md-8" align="center"><br><br>
      <button  style="align-items: center;" type="submit" name="editTin" id="editTin">Sửa</button>
    </div>
      
  </div>
</form>
<br><br><br><br><br>
</section> 