<?php 
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$database="quanlymaytinhxachtay";
	//kết nối đến csdl
	$conn = mysqli_connect($servername, $username, $password,$database) or die("Lỗi kết nối");
	mysqli_set_charset($conn,"utf8");
?>