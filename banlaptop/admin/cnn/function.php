<?php 
//Kiểm tra xem kết quả trả về có đúng hay không
function kt_query($result,$query) {
global $dbc;
//Lấy tất cả các biến trong thư mục web của mình	
if(!$result)
	{
		die("Query {$query} \n <br> MYSQL Error:".mysqli_error($dbc));
	}
}
?>