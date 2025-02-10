<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <?php 
        session_start();
        require '../inc/myconnect.php';
        $username =  $password = $kq = "";
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $lenh = "SELECT * FROM `admin` WHERE username = '$username' and password = '$password'";
            $result = mysqli_query($mysqli,$lenh);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    $_SESSION['username'] = $username ;
                    $_SESSION['password'] = $row["password"];
                        header('Location: admin.php');
                        $row = $result->fetch_assoc();  
                }       
            }
            else
            {
                $kq ="Thông tin không đúng vui lòng kiềm tra lại";
            }
        }
    ?>
    <div class="login-container">
        <div class="login-box">
            <h2>Đăng nhập</h2>
            <p>TRANG QUẢN TRỊ VIÊN</p>
            <form action="#" method="POST">
                <div class="input-group">
                    <input type="text" placeholder="Vui lòng nhập tài khoản" name="username" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="••••••••" name="password" required>
                </div>
                <button type="submit" name="submit" class="btn-login">Sign in!</button>
                <p style="color:red; margin-top: 10px"><?php echo $kq; ?></p>
            </form>
        </div>
    </div>
</body>
</html>