<?php
require 'myconnect.php';
//lay danh sach san pham khuyen mai
$sql="SELECT * FROM `sanpham` ORDER BY ID ASC ";
$result = mysqli_query($mysqli, $sql);
$mysqli->close();
?>