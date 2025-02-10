
<?php
ob_start();
?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php
   require '../inc/myconnect.php';
   //lay san pham theo id
   $id = $_GET["id"];
   $query="SELECT s.ID,s.Ten,s.Gia,s.HinhAnh,s.HSX,s.Mota,s.idphanloai from sanpham s 
	WHERE  s.ID =".$id;
   $result = $mysqli->query($query);
  $row = $result->fetch_assoc();
  echo '<title>Sửa thông tin ' .$row["Ten"].'</title>';
?>
  <link rel="stylesheet" href="css/suasp.css">
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->

            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Sửa Sản phẩm</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php include 'xulysua.php' ?>" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tên</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="<?php echo $row["Ten"] ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Hình ảnh</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinhanh" value="<?php echo $row["HinhAnh"] ?>">
                      </div>
                      </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hãng sản xuất</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="hsx" value="<?php echo $row["HSX"] ?>" required>
                      </div>
                    </div>
                      <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Ảnh hiện tại:   </label>
                        <div class="col-sm-10">
                      <img src="../images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:300px">
                        </div>
                      </div>
                      <input type="hidden" class="form-control" name="anh" value="<?php echo $row["HinhAnh"] ?>">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $row["ID"] ?>">
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Loại sản phẩm</label>
                    <div class="col-sm-10">
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Giá</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="gia" required value="<?php echo $row["Gia"] ?>">
                    </div>
                    </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-10">
                    <textarea id="editor1" name="editor1" name="editor1"  rows="10" cols="80">
                    <?php echo $row["Mota"] ?>
                    </textarea>
                    </div>
                  </div>
               
                  <div class="box-footer">
                  <a href="quanlysanpham.php"><button type="button" name="cancel" class="btn btn-default">Thoát</button></a>
                    <button type="submit" name="Edit" class="btn btn-info pull-right">Sửa</button>
                    </div><!-- /.box-body -->
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            <!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->

