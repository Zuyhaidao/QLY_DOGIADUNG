<link rel="stylesheet" href="css/themsp.css">

<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli("localhost","root","","do_gia_dung");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn để lấy danh sách loại sản phẩm
$sql = "SELECT ID, Ten FROM phanloai";
$result = $conn->query($sql);
?>

  <title>Thêm sản phẩm</title>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="box-header">
    <h1>
      Thêm Sản Phẩm
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->

      <!-- right column -->
      <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <!-- form start -->
          <form class="form-horizontal" method="POST" action="<?php include 'xulysp.php' ?>" enctype="multipart/form-data">
            <div class="box-body">
              <!-- Tên -->
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tên</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" placeholder="Tên" required>
                </div>
              </div>
              
              <!-- Hình ảnh -->
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Hình ảnh</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" placeholder="Chọn tiệp" name="hinhanh" required>
                </div>
              </div>
              
              <!-- Hãng sản xuất -->
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Hãng sản xuất</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="hsx" placeholder="Hãng sản xuất" required>
                </div>
              </div>
              
              <!-- Loại sản phẩm -->
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Loại sản phẩm</label>
                <div class="col-sm-10">
                  <select class="form-control select2" style="width: 100%;" name="idphanloai" placeholder="Chọn Loại sản phẩm">
                    <option selected="selected" value="" ></option>
                    <?php
                    if ($result->num_rows > 0) {
                      // Duyệt qua từng dòng dữ liệu
                      while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['ID'] . '">' . $row['Ten'] . '</option>';
                      }
                    } else {
                      echo '<option value="">Không có dữ liệu</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>


              <!-- Giá -->
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Giá</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="gia">
                </div>
              </div>

              <!-- Mô tả -->
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
                <div class="col-sm-10">
                  <textarea id="editor1" name="editor1" rows="10" cols="80">
                    Nhập mô tả
                  </textarea>
                </div>
              </div>
            </div><!-- /.box-body -->

            <!-- Submit and Cancel -->
<div class="box-footer">
              <a href="quanlysanpham.php">
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