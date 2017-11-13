<meta charset="utf-8">
<?php
	session_start();
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'quanly_nhom1');
	// kết nối
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die("can't connect database".DB_HOST);
	mysqli_set_charset($conn,'utf8');
?>