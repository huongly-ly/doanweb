<?php 
$id = $_GET["id"];

$Sel_edit = "SELECT * FROM tbl_sp where id_sp = '$id'";
$rs_edit = mysqli_query($conn,$Sel_edit);
$row_edit = mysqli_fetch_array($rs_edit);

if (isset($_POST["Edit"])) {
    $name_prod = $_POST["name"];
    $prod_type = $_POST["prod_type"];
    $manufacturer = $_POST["manufacturer"];
    $thongso= $_POST["thongso"];
    $mota = $_POST["mota"];
    $noibat = $_POST["noibat"];
    $dateCreate =date("Y-m-d H:i:s");
    $price =$_POST["giasp"];
    $status1 =$_POST['status'];

    $sale=$_POST["sale"];


    $anh1 = $anh2 = $anh3 = "";
          if (isset($_FILES["img1"]["name"])) {
            
            if ($_FILES["img1"]["type"]=="image/jpeg" || $_FILES["img1"]["type"]=="image/png") {
                $anh1 ="upload/".$_FILES["img1"]["name"];
                move_uploaded_file($_FILES['img1']['tmp_name'],"../upload/imgproduct/upload/".$_FILES["img1"]["name"]); 
 
            }else {
              $anh1 =$row_edit['img1'];
            }
          }
        if (isset($_FILES["img2"]["name"])) {
            if ($_FILES["img2"]["type"]=="image/jpeg" || $_FILES["img2"]["type"]=="image/png") {
                $anh3 ="upload/".$_FILES["img2"]["name"];
                move_uploaded_file($_FILES['img2']['tmp_name'], "../upload/imgproduct/upload/".$_FILES["img2"]["name"]);
            }else {
              $anh2 =$row_edit['img2'];
            }
          }

           if (isset($_FILES["img3"]["name"])) {
            if ($_FILES["img3"]["type"]=="image/jpeg" || $_FILES["img3"]["type"]=="image/png") {
                $anh3 ="upload/".$_FILES["img3"]["name"];
                move_uploaded_file($_FILES['img3']['tmp_name'], "../upload/imgproduct/upload/".$_FILES["img3"]["name"]);
            }else {
              $anh3 =$row_edit['img3'];
            }
          }
$Update = "UPDATE tbl_sp SET name_sp='$name_prod',id_loaisp=$prod_type,id_hangsx=$manufacturer,noibat='$noibat',thongso_sp='$thongso',mota_sp='$mota',img1='$anh1',img2='$anh2',img3='$anh3',status=$status1,sale=$sale,gia_sp=$price WHERE id_sp =$id";
mysqli_query($conn,$Update);
//var_dump($Update);
 

}


?>
<section class="wrapper">
  <div class="panel-heading">
    Sửa sản phẩm
 </div>
 <form action="" class="form-horizontal form-material" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-md-8">Tên sản phẩm</label>
    <div class="col-md-8">
      <input class="form-control form-control-line" type="text" name="name" id="name" value="<?php echo $row_edit["name_sp"];  ?>">
    </div>
    <label class="col-md-8">Loại sản phẩm </label>
    <div class="col-md-8">
      <select name="prod_type" id="prod_type" class="form-control form-control-line">
        <option value="">--Chọn loại sản phẩm--</option>
        <?php  
        $sqlSelect = "SELECT * FROM tbl_loaisp";
        $result = mysqli_query($conn,$sqlSelect) or die("Chết câu select ");
        while ($rowP = mysqli_fetch_assoc($result)) {
          $selected="";
          if ($row_edit&&$row_edit["id_loaisp"]==$rowP["id_loaisp"]) {
           $selected="selected";      
           $hangsx=$id;  
                }
          ?>
          <option <?php echo $selected; ?> value="<?php echo $rowP["id_loaisp"] ?>" /><?php echo $rowP["name_loaisp"] ?></option>
          <?php 
        }
        ?>
      </select>
    </div>
    <label class="col-md-8">Hãng sản xuất </label>
    <div class="col-md-8">
      <select name="manufacturer" id="manufacturer" class="form-control form-control-line">
        <option value="">--Chọn hãng sản xuất--</option>
        <?php  
        $sqlSelect = "SELECT * FROM tbl_hangsx";
        $result = mysqli_query($conn,$sqlSelect) or die("Chết câu select ");
        while ($rowP = mysqli_fetch_assoc($result)) {
          $selected="";
         if ($row_edit&&$row_edit["id_hangsx"]==$rowP["id_hangsx"]) {
           $selected="selected";    
           $hangsx=$id;      
         }
          ?>
          <option <?php echo $selected; ?> value="<?php echo $rowP["id_hangsx"] ?>"><?php echo $rowP["name_hangsx"] ?></option>
          <?php 
        }
        ?>
      </select>
    </div>
    <label class="col-md-8">Thông tin nổi bật</label>
    <div class="col-md-8">
      <textarea id="froala-editor" name="noibat" ><?php echo $row_edit["noibat"] ?></textarea>
    </div>
    <label class="col-md-8">Thông số sản phẩm</label>
    <div class="col-md-8">
      <textarea id="froala-editor" name="thongso"><?php echo $row_edit["thongso_sp"] ?></textarea>
    </div>

    <label class="col-md-8">Mô tả sản phẩm</label>
    <div class="col-md-8">
       <textarea id="froala-editor" name="mota" value=""><?php echo $row_edit["mota_sp"] ?></textarea>
    </div>
    <label class="col-md-8">Ảnh sản phẩm</label>
    <div class="col-md-8">
    Ảnh 1: <img src="../upload/imgproduct/<?php echo $row_edit["img1"];?>" width="80" height="80"> <input class="form-control form-control-line" type="file" name="img1" id="img1"><br>
    Ảnh 2: <img src="../upload/imgproduct/<?php echo $row_edit["img2"];?>" width="80" height="80"> <input class="form-control form-control-line" type="file" name="img2" id="img2" ><br>
    Ảnh 3: <img src="../upload/imgproduct/<?php echo $row_edit["img3"];?>" width="80" height="80"> <input class="form-control form-control-line" type="file" name="img3" id="img3" >
    </div>
    <label class="col-md-8">Giảm giá(%)</label>
    <div class="col-md-8" style="display: inline;">
      <input class="form-control form-control-line" placeholder="0" type="number" name="sale" id="sale" min="0" max="99" value="<?php echo $row_edit["sale"];  ?>">
    </div>
    <label class="col-md-8">Giá</label>
    <div class="col-md-8" style="display: inline;">
      <input class="form-control form-control-line" placeholder="0" type="number" name="giasp" id="giasp" value="<?php echo $row_edit["gia_sp"];  ?>">
    </div>
    <label class="col-md-8">Tình trạng</label>
    <div class="col-md-8" style="display: inline;">

      <input type="radio" <?php if ($row_edit['status']==0) {
        echo 'checked';
      } ?> name="status" id="status" value="0"> Hết hàng
      <input  type="radio" <?php if ($row_edit['status']==1) {
        echo 'checked';
      } ?> name="status" id="status" value="1"> Còn hàng

    </div>
    <div class="col-md-8" align="center">
      <button type="submit" name="Edit" id="Edit">Cập nhật</button>
    </div>
  </div>
</form>
<br><br><br><br><br>
</section> 