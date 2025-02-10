<?php
    require '../inc/myconnect.php';
    $id = $_GET['id'];

    // sql to delete a record
    $sql = "DELETE FROM sanpham WHERE ID=".$id;

    if ($mysqli->query($sql) === TRUE) {
        header('Location: quanlysanpham.php');
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

$mysqli->close();
?>
        <script>
function myFunction() {
    alert("Xóa thành công");
}
</script>