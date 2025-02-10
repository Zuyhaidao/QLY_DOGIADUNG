<?php
	$mysqli = new mysqli("localhost","root","","do_gia_dung");
	
	if ($mysqli->connect_errno) {
	  echo "Kết nối thật bại: " . $mysqli->connect_error;
	  exit();
	}
?>