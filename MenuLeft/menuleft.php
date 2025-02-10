    <!-- Biểu tượng menu -->
    <div class="menu-icon" onclick="toggleMenu()">☰</div>

    <!-- Menu bên trái -->
    <div class="sidebar" id="sidebar">
        <!-- Nút đóng menu -->
        <span class="close-btn" onclick="toggleMenu()">×</span>
        
        <a href="./index.php">Trang chủ</a>
        <a href="./Info.php">Thông tin tài khoản</a>
        <a href="./cart.php">Giỏ hàng</a>        
        <a onclick="toggleSubmenu()">Danh mục</a>
        
        <div class="submenu" id="submenu">
        <?php
            require 'inc/myconnect.php';

            $layidrandom = "SELECT ID, Ten FROM phanloai";
            $kq = $mysqli->query($layidrandom);

            if ($kq === false) {
                echo "Error: " . $mysqli->error;
            } else {
                if ($kq->num_rows > 0) {
                    while ($d = $kq->fetch_assoc()) {
            ?>
                        <li class="menu-list-item">
                            <a href="./category.php?idphanloai=<?php echo $d['ID']; ?>" class="menu-link">
                                <?php echo htmlspecialchars($d['Ten']); ?>
                            </a>
                        </li>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>

    <script>
        // Hàm toggle cho menu
        function toggleMenu() {
            document.getElementById("sidebar").classList.toggle("active");
        }

        // Hàm toggle cho submenu danh mục
        function toggleSubmenu() {
            var submenu = document.getElementById("submenu");
            submenu.style.display = submenu.style.display === "block" ? "none" : "block";
        }
    </script>
