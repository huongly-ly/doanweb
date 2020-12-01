<?php  
include("common/connection.php");
$userName = "";
$password ="";
$checked = false;
//kiểm tra xem người dùng có chọn click Login hay không
if(isset($_POST["login"])){
//lấy dc gia trị trên form nhập từ người dùng

	$username = $_POST["userName"];
	$password = $_POST["password"];
//kiếm tra xem người dùng có chọn lưu thông tin không
// 	if(isset($_POST["rememberme"])){
// //tạp ra cookier có tên và giá trị
// 		setcookie("user_name",$username);
// 		setcookie("password",$password);
// 	}
//tạo 1 mảng có thông tin 
	$datauser ="SELECT * FROM tbl_user where username='$username' and password='$password'";
	$result1 = mysqli_query($conn,$datauser);

	// $result = mysqli_fetch_array($result1);

//kiểm tra thông tin tài khoản và password người dùng nhập vào 
	if (mysqli_num_rows($result1) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    $row = mysqli_fetch_array($result1);
    if ($password != $row["password"]) {
    	echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

	
//tạo session và chạy về trang chủ
		$_SESSION["username"] = $username;
		echo "Xin chào " . $username . ".Bạn đã đăng nhập thành công. <a href='index.php'>Về trang chủ</a>";
    die();
		// header("location:index.php");//chuyển đến nơi nào đó
		// echo "<script type='text/javascript'>alert('Bạn đã đăng nhập thành công!');</script>";

//thực hiện viết câu lệnh truy vấn mysql ở đây
}
//kiểm tra nếu tồn tại 2 cookie đã lưu ở bước trước
if(isset($_COOKIE["username"]) && isset($_COOKIE["username"])){
//gán giá trị của cookie đã lưu vào 2 biến tương ứng
	$userName = $_COOKIE["username"];
	$password = $_COOKIE["password"];
	$checked = true;
}	
?>
<!-- <div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4" >
			<form method="post"> 
				<div class="form-group">
				<label for="exampleInputEmail1">Tên đăng nhập</label>
					<input type="text" class="form-control"  value="<?php echo $userName ?>" id="userName" name="userName" placeholder="Tên đăng nhập">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Mật khẩu</label>
					<input type="password" class="form-control" value="<?php echo $password ?>"  id="password" name="password" placeholder="mật khẩu">
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo ($checked)?"checked":"" ?> name="rememberme" id="rememberme"> Lưu đăng nhập
					</label>
				</div>
				<button type="submit" class="btn btn-default" name="login">Đăng nhập</button>
			</form>
		</div>
		
	</div>
</div> -->
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
					<li><a href="index.php?view=login"><i class="fa fa-sign-in"></i>Đăng nhập</a></li>
					<li><a href="index.php?view=createid"><i class="fa fa-key"></i>Đăng ký</a></li>
					<li><a href=""><i class="fa fa-key"></i>Quên mật khẩu</a></li>
				</ul>
			</div>                    
		</div>
		<div class="col-md-9">
			<script src="/app/services/accountServices.js"></script>
			<script src="/app/controllers/accountController.js"></script>
			<div class="login-content clearfix ng-scope" ng-controller="accountController" ng-init="initController()">
				<h1 class="title"><span>Đăng nhập hệ thống</span></h1>
				<div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
					<form method="post">
						<div class="form-group">
							<label for="Email" class="col-sm-4 control-label">Tài khoản</label>
							<div class="col-sm-8">
								<input class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" ng-model="Email" ng-required="true" required="required" type="text" value="<?php echo $userName ?>" id="userName" name="userName" >
							</div>
						</div>
						<div class="form-group">
							<label for="Password" class="col-sm-4 control-label">Mật khẩu</label>
							<div class="col-sm-8">
								<input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" ng-model="Password" ng-required="true" required="required" type="password" value="<?php echo $password ?>"  id="password" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<button type="submit" class="btn btn-default" name="login">Đăng nhập</button>
								<a href="/quen-mat-khau.html">Quên mật khẩu</a>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>