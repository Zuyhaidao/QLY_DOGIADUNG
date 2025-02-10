<?php 
    require '../inc/myconnect.php';
    $fullname = $username = $password = $password_confirmation = $kqdk = $email = $sdt = $address = "";
    
    if(isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $address = $_POST['address'];
        $password_confirmation = $_POST['password_confirmation'];
        
        if($password_confirmation != $password) {
            $kqdk = "Mật khẩu nhập lại không chính xác";
        } else {
            $lenh = "INSERT INTO `user`(`username`, `password`, `fullname`, `email`, `diachi`, `sdt`) 
                    VALUES ('$username', '$password', '$fullname', '$email', '$address', '$sdt')";
            $result = mysqli_query($mysqli, $lenh);
            
            if($result) {
                $fullname = $username = $password = $email = $sdt = $address = $password_confirmation = "";
                $kqdk = "Đăng ký thành công";
            } else {
                $kqdk = "Đăng ký không thành công, xin hãy kiểm tra lại thông tin";
            }
        }
        mysqli_close($mysqli); 
    }
?>

<link rel="stylesheet" href="./css/signup.css"/>
<nav class="header-background">
        <div class="header">
            <img src="./images/logo.png" alt="Logo Bán hàng đồ gia dụng" class="logo_1">
            <p class="title">Đăng Ký</p>
            <a href="https://help.shopee.vn/vn/s" target="_blank" class="help_service">Bạn cần giúp đỡ ?</a>
        </div>
    </nav>
    <div class="container">
        <div class="left-section">
            <div class="logo-content">
                <img src="./images/logo.png" alt="Logo Bán hàng đồ gia dụng" class="logo">
                <h1>Đồ Gia Dụng</h1>
                <p>Chất lượng - Tiện lợi - Giá cả phải chăng</p>
            </div>
        </div>

        <div class="right-section">
            <div class="form-content sign-up">
                <h3 class="form-title">Đăng ký tài khoản</h3>
                <form action="" class="signup-form" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="fullname" class="form-label">Tên đầy đủ</label>
                        <input id="fullname" name="fullname" type="text" placeholder="VD: Nguyễn Văn A" class="form-control" required>
                        <span class="form-message form-message-name"></span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" placeholder="VD: Nguyenvana@gmail.com" class="form-control" required>
                        <span class="form-message form-message-name"></span>
                    </div>
                    <div class="form-group">
                        <label for="sdt" class="form-label">Số điện thoại</label>
                        <input id="sdt" name="sdt" type="number" placeholder="VD: 0915791171" class="form-control" required>
                        <span class="form-message form-message-name"></span>
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input id="address" name="address" type="text" placeholder="VD: Nghệ an" class="form-control" required>
                        <span class="form-message form-message-name"></span>
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input id="username" name="username" type="text" placeholder="Nhập tên đăng nhập" class="form-control" required>
                        <span class="form-message form-message-username"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control" required>
                        <span class="form-message form-message-password"></span>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Nhập lại mật khẩu" class="form-control" required>
                        <span class="form-message form-message-password-confirmation"></span>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkbox-signup" class="checkbox" required>
                        <label for="checkbox-signup" class="form-checkbox">Tôi đồng ý với <a href="#" title="chính sách trang web" target="_blank">chính sách trang web</a></label>
                        <p class="form-message form-message-checkbox"></p>
                    </div>
                    <button name="submit" type="submit" class="form-submit" id="signup-button">Đăng ký</button>
                    <p style="color:red"><?php echo $kqdk; ?></p>
                </form>
                <p class="change-login">Bạn đã có tài khoản? <a href="login.php" class="login-link">Đăng nhập ngay</a></p>
            </div>
        </div>
