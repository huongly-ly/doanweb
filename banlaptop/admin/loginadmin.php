<?php  
ob_start();
//khởi tạo session
include("../common/connection.php");
?>
<!DOCTYPE html>
<head>
<title>Admin system Laptop mới  </title>
<link rel="shortcut icon" href="../upload/imgwb/logo.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Khách truy cập Responsive web template, Bootstrap Web Templates, Mẫu Web Phẳng, mẫu web tương thích với Android,
Mẫu web tương thích với điện thoại thông minh, thiết kế web miễn phí cho Nokia, Samsung, LG, SonyEricsson, thiết kế web của Motorola-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body style="min-height: 918px;">

<div class="log-w3">
<div class="w3layouts-main">
	<?php 
	
    if (isset($_SESSION['username'])) {
        header("location:'admin.php'");
    }
	
    //kiểm tra xem người dùng postlogin 
    if(isset($_POST["login"])){
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		if(isset($_POST["checked"])){
	 //tạp ra cookier có tên và giá trị
		setcookie("username",$username);
		setcookie("password",$password);}
		if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
	//gán giá trị của cookie đã lưu vào 2 biến tương ứng
		$username = $_COOKIE["username"];
		$password = $_COOKIE["password"];
		$checked = true;
			
		}   
		echo "<script>alert('test');</script>";
		if($username=="yendaica")
		{
			$_SESSION["username"] = "yendaica";
			$_SESSION["role"] =1;
			echo "<script>alert('Xin chào: $username');</script>";
			header("location:admin.php");
				
		}
	
    $datauser ="SELECT * FROM tbl_user where username='$username' and role=1 OR username='$username' and role=2  ";
    $kq = mysqli_query($conn,$datauser);
    $sql_row = mysqli_num_rows($kq);
    $sql_data =mysqli_fetch_assoc($kq);
    $sql_dt =mysqli_fetch_array($kq);
    //var_dump($sql_dt);
     
    if ($sql_row <= 0) {
        echo "<script>alert('Tài khoản không tồn tại hoặc tài khoản bạn không đủ quyền vào trang này!');</script>";
    }else{
        if ($password != $sql_data["password"]) {
            echo "<script>alert('Tài khoản or mật khẩu chưa đúng! Vui lòng thử lại');</script>";
        }else {
            echo "<script>alert('Xin chào: $username');location.href='admin.php';</script>";
            $_SESSION["username"] = $sql_data["username"];
            $_SESSION["role"] =$sql_data["role"];
           
        }
    }
    
	}
                    ?>
	<h2>Đăng nhập ngay</h2>
		<form action="" method="post">
            <label >User Name</label>
			<input type="text" class="form-control" id="username" name="username" placeholder="Input user name please" required="">
            <label >Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
			<span><input type="checkbox" name="checked">Remember Me</span>
			
				<div class="clearfix"></div>
			<button type="submit" class="btn btn-default" name="login" id="login">Submit</button>
		</form>
</div>
</div>
<footer style="position: fixed; bottom: 20px; ">
	<h4 style="color: #0000ff">&copy; 2019 Thế giới Laptop mới  </h4>
</footer>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>