<?php 
require 'PHPMailer/PHPMailerAutoload.php';
include('PHPMailer/class.smtp.php');
include "PHPMailer/class.phpmailer.php"; 
global $conn;
if (isset($_POST["getpass"])) {
	$email = $_POST['email'];
	$query="SELECT * FROM tbl_user WHERE email = '$email'";
	$result = mysqli_query($conn,$query);
	if($result){
		$sql_row=mysqli_fetch_assoc($result);
		$row = mysqli_num_rows($result);
		if($row > 0) {
	//update password
	$code = substr( md5(rand(1,9999)), 0, 8);
	mysqli_query($conn,"update tbl_user set code = '$code' where email = '$email'");
	//send email
	
    $nFrom = "Thegioialo.vn";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = "infothegioialo@gmail.com";  //dia chi email cua ban luongitbkap@gmail.com"
    $mPass = "Ah123456@";       //mat khau email cua ban luongit!%@$
    $mail= new PHPMailer();
    $link="http://localhost:8023/thegioialo/index.php?view=getpass&code=<?php echo $code; ?>";
    $body  = ("Bạn quên mật khẩu vui lòng click vào link bên dưới để lấy lại mật khẩu!<a href='http://localhost:8023/thegioialo/index.php?view=getpass&email=".$email."&code=".$code."'  target='_blank'>Click vào đây<a>");   // Noi dung email
    $title = 'Lấy lại mật khẩu trang web thegioialo';   //Tieu de gui mail
    $mail->IsSMTP();          
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo('infothegioialo@gmail.com', 'Đẹp Trai Từ Bé'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email 
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($email, $sql_row["username"]);
    // thuc thi lenh gui mail 
    if(!$mail->Send()) {
        echo "<script>alert('Server đang quá tải vui lòng bạn thử lại sau.'); </script>";
         
    } else {
         
        echo "<script>alert('Mail đã được gửi vui lòng check email của bạn.');window.location.href='index.php'; </script>";
    }
}
//Ban viet code gui email vao day nhe
//return lai trang dang nhap
	}else{
		echo "<script>alert('Email không tồn tại!');window.location.href='index.php?view=fogetpass';</script>";
	}
}
 ?>

<div class="tabs-category clearfix">
	<div class="tab-content clearfix container">
		<div class="tabs-title">
			<div id="" class="tab-title">
				<h3>
					<span>Quên mật khẩu</span>
				</h3>
			</div>
		</div>

	</div>
	
</div>
<div class="container female">
	<div class="row pTB" >
		<form action="" method="post">
			<span >Email đăng ký:</span><input style="margin-top: 10px; margin-left: 15px;" type="email" name="email"><br>
			<button type="submit" name="getpass"  style="margin-top: 15px; margin-left:120px; ">Gửi</button>
			</form>
	</div>
</div>
