<?php 
session_start(); 
?>

<div class="header-middle-right">
    <ul class="header-middle-right-list">
        <?php if (isset($_SESSION['username'])): ?>
            <li class="header-middle-right-item">
                <i class="fa-light fa-user"></i>
                <span class="glyphicon glyphicon-user"></span> 
                <a style="color:Tomato;" href="./Info.php"><b><?php echo htmlspecialchars($_SESSION['fullname']); ?></b></a>
            </li>
            
            <li class="header-middle-right-item open">
                <div class="cart-icon-menu">
                    
                    <a class="btn btn-1" href="./cart.php"><i class="fa-light fa-basket-shopping"></i></a>
                    <span class="count-product-cart">
                        <?php
                            $ok=1;
                             if(isset($_SESSION['cart']))
                             {
                                 foreach($_SESSION['cart'] as $key => $value)
                                 {
                                     if(isset($key))
                                     {
                                        $ok=2;
                                     }
                                 }
                             }
                            
                             if($ok == 2)
                             {
                                echo count($_SESSION['cart']);
                             }
                            else
                            {
                                echo   "0";
                            }
                        ?>
                    </span>
                </div>
                <span>Giỏ hàng</span>
            </li>
            <li class="header-middle-right-item">
                <span class="glyphicon glyphicon-log-out"></span>
                <a style="color: red;color: black; font-weight: bold;" href="./logout.php"> Đăng xuất</a>
            </li>
        <?php else: ?>
            <li class="header-middle-right-item dropdown open">
                <i class="fa-light fa-user"></i>
                <div class="auth-container">
                    <span class="text-dndk">Đăng nhập / Đăng ký</span>
                    <span class="text-tk">Tài khoản <i class="fa-sharp fa-solid fa-caret-down"></i></span>
                </div>
                <ul class="header-middle-right-menu">
                    <li><a id="login" href="./Login_Signup/login.php"><i class="fa-light fa-right-to-bracket"></i> Đăng nhập</a></li>
                    <li><a id="signup" href="./Login_Signup/signup.php"><i class="fa-light fa-user-plus"></i> Đăng ký</a></li>
                </ul>
            </li>
            <li class="header-middle-right-item open">
                <div class="cart-icon-menu">
                    <a class="btn btn-1" href="./cart.php"><i class="fa-light fa-basket-shopping"></i></a>
                    <span class="count-product-cart">
                        <?php
                            $ok=1;
                             if(isset($_SESSION['cart']))
                             {
                                 foreach($_SESSION['cart'] as $key => $value)
                                 {
                                     if(isset($key))
                                     {
                                        $ok=2;
                                     }
                                 }
                             }
                            
                             if($ok == 2)
                             {
                                echo count($_SESSION['cart']);
                             }
                            else
                            {
                                echo   "0";
                            }
                        ?>
                    </span>
                </div>
                <span>Giỏ hàng</span>
            </li>
        <?php endif; ?>
    </ul>
</div>