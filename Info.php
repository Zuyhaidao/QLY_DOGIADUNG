<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/font/font-awesome-pro-v6-6.2.0/css/all.css" />
    <link rel="stylesheet" href="./css/main.css"/>
    <link rel="stylesheet" href="./css/user.css"/>
    <link rel="stylesheet" href="./css/Info.css"/>
    <link rel="stylesheet" href="Header/css/headertop.css" />
    <link rel="stylesheet" href="Header/css/headermiddle.css" />
    <link rel="stylesheet" href="Header/css/headerbottom.css" />
    <link rel="stylesheet" href="./Footer/css/footer.css" />
    <link rel="stylesheet" href="./MenuLeft/css/menuleft.css" />
</head>
    <?php 
        include("inc/myconnect.php");     // Kết nối cơ sở dữ liệu
        include("inc/truyvan.php");       // Các hàm truy vấn chung
        include("Header/header.php");     // Header của trang
        include("MenuLeft/menuleft.php");
    ?>

    <?php
    // Lấy username từ session hoặc URL
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    if (empty($username)) {
        echo "Vui lòng đăng nhập để chỉnh sửa thông tin.";
        exit;
    }

    // Truy vấn thông tin người dùng dựa trên username
    $user_query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($mysqli, $user_query);
    $user = mysqli_fetch_assoc($result);

    // Kiểm tra xem người dùng có tồn tại không
    if (!$user) {
        echo "Người dùng không tồn tại.";
        exit;
    }

    // Biến để theo dõi trạng thái chỉnh sửa
    $is_editing = false; // Mặc định không chỉnh sửa

    $kq ='';
    $kq2 ='';
    // Nếu người dùng submit form để cập nhật thông tin
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['edit'])) {
            $is_editing = true; // Nếu nhấn nút Sửa
        } elseif (isset($_POST['update'])) {
            // Cập nhật thông tin người dùng
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];

            // Cập nhật thông tin người dùng trong cơ sở dữ liệu
            $update_query = "UPDATE user SET fullname='$full_name', email='$email', sdt='$phone_number', diachi='$address' WHERE username='$username'";

            // Thực hiện câu truy vấn và kiểm tra kết quả
            if (mysqli_query($mysqli, $update_query)) {
                $kq=  'Cập nhật thông tin thành công!';
                // Cập nhật lại thông tin người dùng để hiển thị
                $user = mysqli_fetch_assoc(mysqli_query($mysqli, $user_query));
                $is_editing = false; // Đặt lại trạng thái chỉnh sửa
            } else {
                $kq= 'Cập nhật thông tin thất bại ';
            }
        } elseif (isset($_POST['submit_password_change'])) {
            // Đổi mật khẩu
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            // Kiểm tra mật khẩu cũ
            if ($user['password'] !== $old_password) {
                $kq2 = 'Mật khẩu cũ không đúng';
            } elseif ($new_password !== $confirm_password) {
                $kq2 = 'Mật khẩu mới và xác nhận mật khẩu không trùng nhau';
            } else {
                // Cập nhật mật khẩu mới mà không mã hóa
                $update_password_query = "UPDATE user SET password='$new_password' WHERE username='$username'";
                if (mysqli_query($mysqli, $update_password_query)) {
                    $kq2 = 'Đổi mật khẩu thành công!';
                } else {
                    $kq2 = 'Đổi mật khẩu thất bại: ';
                }
            }
        }
    }
    ?>

<body>
    <div class="content-wrapper">
        <div class="box">
            <div class="box-header">
                <?php 
                    echo $is_editing ? 'Chỉnh sửa thông tin cá nhân' : 'Thông tin cá nhân'; 
                    echo '<title>'.($is_editing ? 'Chỉnh sửa thông tin cá nhân' : 'Thông tin cá nhân').'</title>';
                ?>
            </div>
            <div class="box-body">
                <p style="color:red; margin-top: 10px"><?php echo $kq; ?></p>
                <p style="color:red; margin-top: 10px"><?php echo $kq2; ?></p>
                <form class="form-horizontal" method="POST" action="">
                    <div class="form-group">
                        <label for="full_name">Họ tên:</label>
                        <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo htmlspecialchars($user['fullname']); ?>" <?php echo $is_editing ? '' : 'readonly'; ?>>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" <?php echo $is_editing ? '' : 'readonly'; ?>>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Số điện thoại:</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?php echo htmlspecialchars($user['sdt']); ?>" <?php echo $is_editing ? '' : 'readonly'; ?>>
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <textarea id="address" name="address" class="form-control" <?php echo $is_editing ? '' : 'readonly'; ?>><?php echo htmlspecialchars($user['diachi']); ?></textarea>
                    </div>

                    <input type="submit" class="btn btn-info" name="<?php echo $is_editing ? 'update' : 'edit'; ?>" value="<?php echo $is_editing ? 'Cập nhật' : 'Sửa'; ?>">
                </form>

                <!-- Button đổi mật khẩu -->
                <button class="btn btn-default" onclick="togglePasswordChange()">Đổi mật khẩu</button>

                <!-- Form đổi mật khẩu -->
                <div id="password-change" style="display: none;">
                    <h2 class="box-header_2">Đổi mật khẩu</h2>
                        <form class="form-horizontal" method="POST" action="">
                        <div class="form-group_2">
                            <label for="old_password">Mật khẩu cũ:</label>
                            <input type="password" id="old_password" name="old_password" class="form-control" required>
                        </div>

                        <div class="form-group_2">
                            <label for="new_password">Mật khẩu mới:</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                        </div>

                        <div class="form-group_2">
                            <label for="confirm_password">Nhập lại mật khẩu:</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                        </div>

                        <input type="submit" class="btn btn-info" name="submit_password_change" value="Cập nhật">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordChange() {
            const passwordChangeDiv = document.getElementById('password-change');
            passwordChangeDiv.style.display = passwordChangeDiv.style.display === 'none' ? 'block' : 'none';
        }
    </script>
    <?php include("Footer/footer.php"); ?>
</body>
</html>
