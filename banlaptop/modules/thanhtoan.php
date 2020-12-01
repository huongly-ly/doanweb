<?php   $total = 0; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <script src="/app/services/orderServices.js"></script>
            <script src="/app/controllers/orderController.js"></script>
            <div class="payment-content ng-scope" ng-controller="orderController" ng-init="initCheckoutController()">
                <h1 class="title"><span>Thanh toán</span></h1>
                <div class="steps clearfix" style="padding-bottom: 30px;">
                    <ul class="clearfix">
                        <li class="cart active col-md-2 col-xs-4 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng</span><span class="step-number"><a>1</a></span></li>
                        <li class="payment col-md-2 col-xs-4 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                        <li class="finish col-md-2 col-xs-4 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                    </ul>
                </div>
                <div class="payment-title text-center hidden">
                    <h3>
                        GIAO HÀNG TOÀN QUỐC - THANH TOÁN KHI NHẬN HÀNG - 15 NGÀY ĐỔI TRẢ MIỄN PHÍ
                    </h3>
                    <div>
                        Nếu gặp khó khăn trong việc đặt hàng xin hãy gọi<b class="hotline"> 0979139451 </b>
                        để được hỗ trợ tốt nhất.
                    </div>
                </div>
                <form class="payment-block clearfix ng-invalid ng-invalid-required ng-valid-email ng-dirty ng-valid-parse" id="checkout-container" method="POST">
                    <div class="col-md-4 col-sm-12 col-xs-12 payment-step step2">
                        <h4>1. Địa chỉ thanh toán và giao hàng</h4>
                        <div class="step-preview clearfix">
                            <h2 class="title">Thông tin thanh toán</h2>
                            <!-- ngIf: CustomerId>0 -->
                            <!-- ngIf: CustomerId<=0 --><div class="form-block ng-scope">
                            <?php 
                            if(!isset($_SESSION["username"])){
                             ?>

                             <div class="user-login"><a href="index.php?view=createid">Đăng ký tài khoản mua hàng</a></div>
                             <?php }else {
                                ?>
                                <div class="user-login"><span>Bạn đang mua hàng bằng tài khoản: <i><?php echo $_SESSION["username"]["username"]; ?></i></span></div> 
                                <?php } ?>
                                <div class="form-group"><input class="form-control" id="fullname" name="fullname" placeholder="Họ &amp; Tên" required="" value="<?php if(isset($_SESSION["username"])){echo $_SESSION["username"]["fullName"];}?>" type="text"></div>
                                <div class="form-group"><input class="form-control" id="phone" name="phone" placeholder="Số điện thoại" value="<?php if(isset($_SESSION["username"])) { echo $_SESSION["username"]["phone"];} ?>" required="" type="text"></div>
                                <div class="form-group"><input class="form-control" id="email" name="email" placeholder="Email" value="<?php if (isset($_SESSION["username"])) {
                                    echo $_SESSION["username"]["email"];
                                } ?>" required="" type="email"></div>

                            <div class="form-group">
                                <i style="color: red; font-size: 11px;">Nhập địa chỉ chi tiết để chúng tôi có thể giao hàng tận nơi cho bạn</i>
                                <div class="form-group"><input id="address" name="address" class="form-control" placeholder="Số nhà- Xã/Phường - Quận Huyện - Tỉnh TP" required="" type="text"></div>
                            </div>
                            <textarea class="form-control" rows="4" id="cmt" name="cmt" placeholder="Ghi chú đơn hàng"></textarea>
                        </div><!-- end ngIf: CustomerId<=0 -->
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12 payment-step step3">
                    <h4>2. Thanh toán và vận chuyển</h4>
                    <div class="step-preview clearfix">
                        <h2 class="title">Vận chuyển</h2>
                        <div class="form-group ">
                            <select class="form-control" name="ptvc">
                                <option value="1" name="" selected="selected">Giao hàng tận nhà</option>
                                <option value="2" >Nhận hàng tại cửa hàng</option>
                            </select>
                        </div>
                        <h2 class="title">Thanh toán</h2>
                        <div class="form-group">
                            <select class="form-control" name="pttt">
                                <option value="1" selected="selected">Thanh toán tiền mặt</option>
                                <option value="2" >Chuyển khoản ngân hàng</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 payment-step step1">
                    <h4>3. Thông tin đơn hàng</h4>
                    <div class="step-preview">
                        <div class="cart-info">
                            <div class="cart-items">
                                <table style="border:1px solid red; width: 100%; font-size: 11px;"  >
                                 <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Giá</th>
                                    <th>Số lương</th>
                                    <th>Thành tiền</th>
                                </tr>
                                <?php  
                                  
                                if(isset($_SESSION["cart"]) && $_SESSION["cart"]){
                                    $i=0;
                                    foreach ($_SESSION["cart"] as $key => $value) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $i ?>
                                            </td>
                                            <td><?php echo $value["name_sp"] ?></td>
                                            <td style="align-items: center;">
                                                <img style="margin-left: -30px;" src="upload/imgproduct/<?php echo $value["img1"] ?>" width="70" alt="">
                                            </td>
                                            <td>
                                                <?php ;
                                                $price=$value['gia_sp'];
                                                $sale=$value['sale'];
                                                $price_sale = $price - $price*$sale/100;
                                                echo number_format($price_sale); ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo $value["productQuanlity"]; ?>
                                            </td>
                                            <td>
                                                <?php $thanhtien= $value["productQuanlity"] * $price_sale; 
                                                echo number_format("$thanhtien",0,",",".");
                                                $total +=$value["productQuanlity"] * $price_sale;
                                                ?>
                                            </td>

                                        </tr>
                                        <?php } ?>
                       
                        <?php  
                    }else{
                        ?>
                        <tr>
                            <td colspan="6"><h4>Không có sản phẩm nào</h4></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <div class="total-price">
                Thành tiền  <label class="ng-binding"> <?php echo number_format($total);  ?> VNĐ</label>
            </div>
            <div class="shiping-price">
                Phí vận chuyển  <label class="ng-binding"><?php $phivc="30000"; echo number_format($phivc);  ?> VNĐ</label>
            </div>
                    
                    <div class="total-payment">
                        Thanh toán <span class="ng-binding"><?php $totals=$total+$phivc;echo number_format($totals);  ?> VNĐ </span>
                    </div>
                    <div class="button-submit">
                        <button class="btn btn-default" name="oder" type="submit">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
<?php include ('modules/adv.php') ?>
<?php 
if(isset($_SESSION['cart'])){

    if (isset($_POST["oder"])) {
        $fullname = $_POST["fullname"] ;
        $email = $_POST["email"] ;
        $phone = $_POST["phone"] ;
        $address = $_POST["address"] ;
        $cmt = $_POST["cmt"] ;
        $date_oder = date('Y-m-d h:i:a');
        $ptvc = isset($_POST['ptvc']) ? $_POST['ptvc'] : 1;
        $pttt = isset($_POST['pttt']) ? $_POST['pttt'] : 1;
        //$last_id = mysqli_insert_id ($conn);
        $sqlInsert = "INSERT INTO tbl_oder" ;
        $sqlInsert .= "(fullname,email,phone,address,dateOder,ptvc,pttt,tongTien,status)";
        $sqlInsert .= " VALUES ('$fullname',' $email', '$phone','$address','$date_oder','$ptvc','$pttt',$totals,1)";
        // echo($sqlInsert); 
        //var_dump($sqlInsert);
        mysqli_query($conn,$sqlInsert);
        $last_id = mysqli_insert_id ($conn);
        foreach ($_SESSION["cart"] as $key => $value) {
           $item[] = $key;
        }
        $str = implode(",",$item);
      
   $sql_cart="select * from tbl_sp where id_sp in ($str)";

   $query_cart=mysqli_query($conn,$sql_cart);
   //var_dump($query_cart);die();
   while($row=mysqli_fetch_assoc($query_cart)) {
          $sqlInsertDetail = "INSERT INTO `tbl_oderdetail`(`oder_id`, `id_sp`, `name_sp`, `sl`, `gia_sp`, `dateOder`, `tong_tien`) VALUES ($last_id,".$row['id_sp'].",'".$row['name_sp']."',".$value['productQuanlity'].",$price_sale,'$date_oder',$thanhtien)";
           
            mysqli_query($conn,$sqlInsertDetail);
   }
// var_dump($sqlInsertDetail);die();
          
            //echo '<script>alert("Dat hang thanh cong")</script>';
        require 'PHPMailer/PHPMailerAutoload.php';
        include('PHPMailer/class.smtp.php');
        include "PHPMailer/class.phpmailer.php"; 
    $nFrom = "Laptopmoi.vn";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = "Laptop24h@gmail.com";  //dia chi email cua ban Laptop24h@gmail.com"
    $mPass = "laptop24h123";       //mat khau email cua ban luongit!%@$
    $mail= new PHPMailer();
    $link="http://localhost:81/Laptop24h/index.php";
    $j = 1;
    $body  = "Bạn đã mua hàng tại <a href='http://localhost:81/laptop24h/index.php' target='_blank'>Laptop mới<a><br>
    <h5>Đơn hàng của bạn: ".$fullname." đã đặt hàng </h5>
    <table style='border:1px solid red;'>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lương</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>";
        foreach ($_SESSION["cart"] as $value):
    
          $body .="<tr>
                <td>".$j++."</td>
                <td>".$value['name_sp']."</td>
                <td style='text-align:center;>".number_format($price_sale)."</td>
                <td style='text-align:center;'>".$value['productQuanlity']."</td>
                <td style='text-align:right;>".number_format($total)."</td>

            </tr>";
        endforeach;
          $body .= "<tr><td colspan='4'>Phí vận chuyển: </td>
                        <td style='text-align:right;'> ".number_format(30000)."</td>";
            $body .= "<tr><td colspan='4'>Tổng tiền: </td>
                        <td> ".number_format($totals).' vnđ'."</td></tr>
        </tbody>
    </table>";



$mail->IsSMTP();          
$mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo('Laptop24h@gmail.com', 'laptopmoi.vn'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email 
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($email, $sql_row["username"]); // thuc thi lenh gui mail 
    if(!$mail->Send()) {
        echo "<script>alert('Đặt hàng thành công.'); </script>";

    } else {

        echo "<script>alert('Đơn hàng bạn đã đặt thành công! Bạn có thể check lại tại email của mình');window.location.href='index.php'; </script>";
        unset($_SESSION['cart']);
    }

}
}else{
    
}

?>