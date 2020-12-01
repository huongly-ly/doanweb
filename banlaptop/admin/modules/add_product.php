<?php 
	if(isset($_POST["addNew"])){
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
 
            }
          }
        
          if (isset($_FILES["img2"]["name"])) {

            if ($_FILES["img2"]["type"]=="image/jpeg " || $_FILES["img1"]["type"]=="image/png") {
                $anh2 ="upload/".$_FILES["img2"]["name"];
                move_uploaded_file($_FILES['img2']['tmp_name'],"../upload/imgproduct/upload/".$_FILES["img2"]["name"]);
            }
          }

           if (isset($_FILES["img3"]["name"])) {
            if ($_FILES["img3"]["type"]=="image/jpeg" || $_FILES["img1"]["type"]=="image/png") {
                $anh3 ="upload/".$_FILES["img3"]["name"];
                move_uploaded_file($_FILES['img3']['tmp_name'], "../upload/imgproduct/upload/".$_FILES["img3"]["name"]);
            }
          }
		// $fileName1 = "";
    
     
		// 	if(isset($_FILES["img1"])){
        
		// 		if($_FILES["img1"]["type"] =="image/jpeg"){
		// 			$fileTem = $_FILES["img1"]["tmp_name"];
		// 			move_uploaded_file($fileTem , "../upload/".$_FILES["img1"]["name"]);
		// 			$fileName1 = "upload/".$_FILES["img1"]["name"];
		// 		}
		// 	}
		
    $sql_product = "INSERT INTO tbl_sp(name_sp,id_loaisp,id_hangsx,noibat, thongso_sp, mota_sp,status,img1,img2,img3,dateCreate,sale,gia_sp) VALUES ('$name_prod','$prod_type','$manufacturer','$noibat','$thongso','$mota',$status1,'$anh1','$anh2','$anh3','$dateCreate','$sale','$price')";
    // echo $sql_product;
    $result = mysqli_query($conn,$sql_product);
    // var_dump($result);
    echo ("<script>alert('Thêm sản phẩm thành công');</script>");
  }
 ?>
<section class="wrapper">
  <div class="panel-heading">
    Thêm mới sản phẩm
 </div>
 <form action="" class="form-horizontal form-material" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-md-8">Tên sản phẩm</label>
    <div class="col-md-8">
      <input class="form-control form-control-line" placeholder="Nhập tên sản phẩm" type="text" name="name" id="name" value="">
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
         
          ?>
          <option <?php echo $selected; ?> value="<?php echo $rowP["id_loaisp"] ?>"><?php echo $rowP["name_loaisp"] ?></option>
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
         
          ?>
          <option <?php echo $selected; ?> value="<?php echo $rowP["id_hangsx"] ?>"><?php echo $rowP["name_hangsx"] ?></option>
          <?php 
        }
        ?>
      </select>
    </div>
    <label class="col-md-8">Thông tin nổi bật</label>
    <div class="col-md-8">
      <textarea id="froala-editor" name="noibat"></textarea>
    </div>
    <label class="col-md-8">Thông số sản phẩm</label>
    <div class="col-md-8">
      <textarea id="froala-editor" name="thongso"></textarea>
    </div>

    <label class="col-md-8">Mô tả sản phẩm</label>
    <div class="col-md-8">
       <textarea id="froala-editor" name="mota"></textarea>
    </div>
    <label class="col-md-8">Ảnh sản phẩm</label>
    <div class="col-md-8">
    Ảnh 1:<input class="form-control form-control-line" type="file" name="img1" id="img1"><br>
    Ảnh 2:<input class="form-control form-control-line" type="file" name="img2" id="img2"><br>
    Ảnh 3:<input class="form-control form-control-line" type="file" name="img3" id="img3">
    </div>
    <label class="col-md-8">Giảm giá</label>
    <div class="col-md-8" style="display: inline;">
      <input class="form-control form-control-line" placeholder="0" type="number" name="sale" id="sale" min="0" max="99" >
    </div>
    <label class="col-md-8">Giá</label>
    <div class="col-md-8" style="display: inline;">
      <input class="form-control form-control-line" placeholder="0" type="number" name="giasp" id="giasp" value="">
    </div>
    <label class="col-md-8">Tình trạng</label>
    <div class="col-md-8" style="display: inline;">
      <input type="radio" name="status" id="status" value="0"> Hết hàng
      <input checked="checked" type="radio" name="status" id="status" value="1"> Còn hàng
    </div>
    <div class="col-md-8" align="center">
      <button type="submit" name="addNew" id="addNew">Thêm</button>
    </div>
  </div>
</form>
<br><br><br><br><br>
</section> 