<?php
if(isset($_POST['create']))
{
 
    require '../inc/myconnect.php';
    $name = $_POST['name'];
    $hinhanh = $_FILES['hinhanh']['name'];
    move_uploaded_file($_FILES['hinhanh']['tmp_name'] , '../Images/'.$_FILES['hinhanh']['name']);
    $hsx = $_POST['hsx'];
    $gia = $_POST['gia'];
    $tacgia = $_POST['tacgia'];
    $mota = $_POST['editor1'];
    $idphanloai = $_POST['idphanloai'];
    $sql="INSERT INTO `sanpham`(`Ten`, `Gia`, `HinhAnh`, `HSX`, `Mota`, `idphanloai`) VALUES ('$name','$gia','$hinhanh','$hsx','$mota','$idphanloai') ";
    // echo  $mk;
    if (mysqli_query($mysqli, $sql)) {
        header('Location: quanlysanpham.php');

    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

 ?>