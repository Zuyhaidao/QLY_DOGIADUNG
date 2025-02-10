<?php 
    if(isset($_POST['Edit']))
    {
    require '../inc/myconnect.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $hinhanh = $_FILES['hinhanh']['name'];
    move_uploaded_file($_FILES['hinhanh']['tmp_name'] , '../Images/'.$_FILES['hinhanh']['name']);
    $hsx = $_POST['hsx'];
    $gia = $_POST['gia'];
    $tacgia = $_POST['tacgia'];
    $mota = $_POST['editor1'];
    $anh =  $_POST['anh'];
    if($hinhanh == null)
    {
        $sql = "UPDATE sanpham SET Ten='$name', Gia='$gia', HinhAnh='$anh', HSX= '$hsx', Mota='$mota',idphanloai=1
        WHERE ID= '$id ' " ;
        if ($mysqli->query($sql) === TRUE) {
            header('Location: quanlysanpham.php');
        } else {
            echo "Error updating record: " . $mysqli->error;
        }
        $mysqli->close();
    }
    else{
        $sql = "UPDATE sanpham SET Ten='$name', Gia='$gia', HinhAnh='$hinhanh', HSX= '$hsx', Mota='$mota',idphanloai=1
        WHERE ID= '$id ' " ;
        if ($mysqli->query($sql) === TRUE) {
            header('Location: quanlysanpham.php');
        } else {
            echo "Error updating record: " . $mysqli->error;
        }
        $mysqli->close();
        }
    }
  
?>
