<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>
    <link rel="stylesheet" href="css/themdanhmuc.css">
</head>
<body>
<div class="container">
    <div class="content-wrapper">
        <section class="box-header">
            <h1>Thêm Danh Mục</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <form class="form-horizontal" method="POST" action="xulydanhmuc.php">
                            <div class="box-body">
                                <!-- Tên danh mục -->
                                <div class="form-group">
                                    <label for="tenDanhMuc" class="col-sm-2 control-label">Tên danh mục</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tenDanhMuc" placeholder="Nhập tên danh mục" required>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->

                            <!-- Submit and Cancel -->
                            <div class="box-footer">
                                <a href="qlydanhmuc.php">
                                    <button type="button" name="cancel" class="btn btn-default">Thoát</button>
                                </a>
                                <button type="submit" name="create" class="btn btn-info pull-right">Tạo</button>
                            </div><!-- /.box-footer -->
                        </form>
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>
</div>
</body>
</html>
