<?php 
//Kết nối cơ sở dữ liệu
$dbc=mysqli_connect('localhost','root','','shopmen');
//Nếu kết nối không thành công thì in ra lỗi
if (!$dbc) {
	echo "Kết nối không thành công";
	# code...
}
else{
	mysqli_set_charset($dbc,'utf8');
}
?>