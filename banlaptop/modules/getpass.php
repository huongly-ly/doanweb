<?php 
	$email = isset($_GET['email']) ? $_GET['email'] : '';
	$code = isset($_GET['code']) ? $_GET['code'] : '';


	if($email  == '')
	{
		$_SESSION['error'] = " Không tồn tại email";
		header("location: index.php");
	}

	if($code  == '')
	{
		$_SESSION['error'] = " Không tồn tại code";
		header("location: index.php");
	}

	$sql_check = " SELECT * FROM tbl_user WHERE email = '".$email."' AND code = '".$code."' ";

	$query_token = mysqli_query($conn,$sql_check) or die (" Lỗi Truy vấn insert code ");
	$user = mysqli_fetch_assoc($query_token);

	if ( $user == NULL )
	{
		$_SESSION['error'] = " Không tồn tại email hoặc code như trên ";
		header("location: index.php");
	}


	if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	$error = [];
    	$password= md5($_POST['password']);
    	$repassword=md5($_POST['repassword']) ;
    	if ( $password == '' or $repassword=='')
    	{
    		$error['password'] = " Mời bạn nhập password ";
    	}
    	if ($password!=$repassword) {
    		echo "<script> alert('Mật khẩu không trùng khớp'); </script>";
    	}else {
    		if ( empty($error))
    	{
    		$password = md5($_POST['password']);
    		$sql_update = " UPDATE  tbl_user SET password = '$password',code='' WHERE email = '".$email."'";
			$query = mysqli_query($conn,$sql_update) or die (" Lỗi Truy vấn insert code ");
			

				echo "<script>alert('Mật khẩu đã đổi thành công');</script>";
				header("location: index.php");
				
    	}
    }

    	
 
    }
?>
<div class="tabs-category clearfix">
	<div class="tab-content clearfix container">
		<div class="tabs-title">
			<div id="" class="tab-title">
				<h3>
					<span>Đặt lại mật khẩu</span>
				</h3>
			</div>
		</div>

	</div>
	
</div>
<div class="container female">
	<div class="row pTB" >
		<form action="" method="post">
			<span >Mật khẩu mới:</span><input style="margin-top: 10px; margin-left: 42px;" type="password" name="password" required="" ><br>
			<span >Nhập lại mật khẩu:</span><input style="margin-top: 10px; margin-left: 15px;" type="password" required="" name="repassword"><br>
			<button type="submit" name="oke"  style="margin-top: 15px; margin-left:120px; ">Ok</button>
			</form>
	</div>
</div>