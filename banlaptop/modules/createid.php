

<?php
if (isset($_POST["submit"])) {
        // echo "<pre>";
        // print_r($_POST);
    $username = $_POST["username"];
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $repassword=md5($_POST['repassword']);
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    
    $gioitinh = $_POST["gioitinh"];


    $sqlcheckuser = "SELECT * FROM tbl_user WHERE username ='$username'";
    $checkResult = mysqli_query($conn, $sqlcheckuser ) or die("Loi truy van1");
    $numUserName = mysqli_num_rows($checkResult);

    $sqlcheckEmail = "SELECT * FROM tbl_user WHERE email ='$email'";
    $checkResultEmail = mysqli_query($conn, $sqlcheckEmail ) or die("Loi truy van2");
    $numEmail = mysqli_num_rows($checkResultEmail);
    $sqlu ="SELECT username FROM tbl_user WHERE username='$username'";
        //Kiểm tra user và email
    if (mysqli_num_rows(mysqli_query($conn,$sqlu)) > 0) {
         echo "<script>alert('tài khoản đã tồn tại'); </script>";    
     }elseif ($numEmail>0) {
        echo "Đã tồn tại email";
    }elseif ($password!=$repassword) {
       echo "<script>alert('Mật khẩu không trùng khớp'); </script>";
    }else {
        $sql = "INSERT INTO tbl_user(fullName,username,password,phone,email,gioitinh,address) VALUES ('$fullName','$username','$password','$phone','$email','$gioitinh','$address')";
      
        mysqli_query($conn,$sql) or die("lỗi truy vấn");
             //var_dump($sqlInsert);
        echo "<script>alert('Bạn đã đăng ký thành công');location.href='index.php';</script>";
    }


}
?>

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
                    <li><a href="index.php?view=createid"><i class="fa fa-key"></i>Đăng ký</a></li>
                    <li><a href="index.php?view=fogetpass"><i class="fa fa-key"></i>Quên mật khẩu</a></li>
                </ul>
            </div>                    
        </div>
        <div class="col-md-9">
            <div class="register-content clearfix ng-scope">
                <h1 class="title"><span>Đăng ký tài khoản</span></h1>
                <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                    <form class="form-horizontal ng-pristine ng-invalid ng-invalid-required ng-valid-email"  method="post">
                        <h2><span>Thông tin tài khoản</span></h2>

                        <div class="form-group">
                            <label for="Code" class="col-sm-3 control-label">Tài khoản<span class="warning">(*)</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" name="username" id="username" ng-model="Code" required="true" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Email" class="col-sm-3 control-label">Email<span class="warning">(*)</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" name="email" id="email"  ng-model="Email" required="true" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Password" class="col-sm-3 control-label">Mật khẩu<span class="warning">(*)</span></label>
                            <div class="col-sm-9">
                                <input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" ng-model="Password" required="true" type="password" name="password" id="password"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="RePassword" class="col-sm-3 control-label">Nhập lại mật khẩu<span>(*)</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" ng-model="RePassword" name="repassword" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Name" class="col-sm-3 control-label">Họ tên<span class="warning">(*)</span></label>
                            <div class="col-sm-9">
                                <input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" ng-model="Name" required="true" type="text" name="fullName" id="fullName">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Điện thoại</label>
                            <div class="col-sm-9">
                                <input class="form-control" pattern="(\\+84|0)\\d{9,10}" ng-model="Phone" type="number" name="phone" id="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Giới tính</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="gioitinh">
                                    <option value="1" >Nam</option>
                                    <option value="0" >Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Địa chỉ</label>
                            <div class="col-sm-9">
                                <input class="form-control ng-pristine ng-untouched ng-valid" ng-model="Address" type="text" name="address" id="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-default" name="submit" id="submit">Đăng ký</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>