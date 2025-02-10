<?php
ob_start();
require '../inc/myconnect.php'; // Kết nối cơ sở dữ liệu

// Lấy ID từ URL
$id = $_GET["id"];

// Truy vấn thông tin danh mục theo ID
$query = "SELECT * FROM phanloai WHERE ID = ".$id;
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

if (!$row) {
    die("Danh mục không tồn tại!");
}

echo '<title>Sửa danh mục ' . $row["Ten"] . '</title>';
?>

<link rel="stylesheet" href="css/suadanhmuc.css">
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Sửa Danh Mục</h1>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Chỉnh sửa thông tin danh mục</h3>
                            </div>
                            <form class="form-horizontal" method="POST" action="xulysuadanhmuc.php" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputTen" class="col-sm-2 control-label">Tên danh mục</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="ten" value="<?php echo $row["Ten"] ?>" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $row["ID"] ?>">
                                </div>
                                <div class="box-footer">
                                    <a href="qlydanhmuc.php"><button type="button" class="btn btn-default">Thoát</button></a>
                                    <button type="submit" name="edit" class="btn btn-info pull-right">Sửa</button>
                                </div>
                            </form>
                        </div><!-- /.box -->
                    </div><!--/.col (right) -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div>
    </div>
</body>
