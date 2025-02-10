<?php 
session_start();
require '../inc/myconnect.php';
$username =  $password = $kq = "";

// Handle user login
if(isset($_POST['submit_user'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $lenh = "SELECT * FROM `user` WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($mysqli, $lenh);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $row["fullname"];
            $_SESSION['password'] = $row["password"];
            header('Location: ../index.php');
            exit();
        }       
    } else {
        $kq = "Thông tin không đúng vui lòng kiểm tra lại";
    }
}

// Handle admin login
if(isset($_POST['submit_admin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $lenh = "SELECT * FROM `admin` WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($mysqli, $lenh);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $row["password"];
            header('Location: ../Admin/admin.php');
            exit();
        }       
    } else {
        $kq = "Thông tin không đúng vui lòng kiểm tra lại";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <style>
        .form-container { display: none; }
        .form-active { display: block; }
    </style>
</head>
<body>
    <nav class="header-background">
        <div class="header">
            <img src="./images/logo.png" alt="Logo Bán hàng đồ gia dụng" class="logo_1">
            <p class="title">Đăng Nhập</p>
            <a href="https://help.shopee.vn/vn/s" target="_blank" class="help_service">Bạn cần giúp đỡ?</a>
        </div>
    </nav>

    <div class="container">
        <div class="left-section">
            <div class="logo-content">
                <img src="./images/logo.png" alt="Logo Bán hàng đồ gia dụng" class="logo_2">
                <h1>Đồ Gia Dụng</h1>
                <p>Chất lượng - Tiện lợi - Giá cả phải chăng</p>
            </div>
        </div>

        <div class="right-section">
            <div class="container">
                <!-- User Login Form -->
                <div id="user-login-form" class="form-container form-active">
                    <div class="form-content login">
                        <h3 class="form-title">Đăng nhập tài khoản người dùng</h3>
                        <form action="" class="login-form" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="form-label">Tên đăng nhập</label>
                                <input id="username-login" name="username" type="text" placeholder="Nhập tên đăng nhập" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input id="password-login" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control" required>
                            </div>
                            <button class="form-submit" name="submit_user">Đăng nhập người dùng</button>
                            <p style="color:red; margin-top: 10px"><?php echo $kq; ?></p>
                        </form>
                        <p class="change-login">Bạn chưa có tài khoản? <a href="signup.php" class="signup-link">Đăng ký ngay</a></p>
                       
                        <div class="form-toggle-buttons">
                            <button id="user-login-btn" class="toggle-button" onclick="showForm('user')">User Login</button>
                            <button id="admin-login-btn" class="toggle-button" onclick="showForm('admin')">Admin Login</button>
                        </div>
                    </div>
                </div>

                <!-- Admin Login Form -->
                <div id="admin-login-form" class="form-container">
                    <div class="form-content login">
                        <h3 class="form-title">Đăng nhập quản trị viên</h3>
                        <form action="" class="login-form" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="form-label">Tên đăng nhập</label>
                                <input id="admin-username-login" name="username" type="text" placeholder="Nhập tên đăng nhập" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input id="admin-password-login" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control" required>
                            </div>
                            <button class="form-submit" name="submit_admin">Đăng nhập quản trị viên</button>
                            <p style="color:red; margin-top: 10px"><?php echo $kq; ?></p>
                            <p onclick="alert('Hãy liên hệ với admin để được cấp tài khoản'); return false;" class="change-login">Bạn chưa có tài khoản? <a href="signup.php" class="signup-link">Đăng ký ngay</a></p>
                        </form>
                        <div class="form-toggle-buttons">
                            <button id="user-login-btn" class="toggle-button" onclick="showForm('user')">User Login</button>
                            <button id="admin-login-btn" class="toggle-button" onclick="showForm('admin')">Admin Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showForm(type) {
            document.getElementById('user-login-form').classList.remove('form-active');
            document.getElementById('admin-login-form').classList.remove('form-active');
            if (type === 'user') {
                document.getElementById('user-login-form').classList.add('form-active');
            } else {
                document.getElementById('admin-login-form').classList.add('form-active');
            }
        }
    </script>
</body>
</html>



