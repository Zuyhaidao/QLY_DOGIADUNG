    <!-- Biểu tượng menu -->
    <div class="menu-icon" onclick="toggleMenu()">☰</div>

    <!-- Menu bên trái -->
    <div class="sidebar" id="sidebar">
        <!-- Nút đóng menu -->
        <span class="close-btn" onclick="toggleMenu()">×</span>
        
        <a href="./admin.php">Trang chủ</a>       
    </div>

    <script>
        // Hàm toggle cho menu
        function toggleMenu() {
            document.getElementById("sidebar").classList.toggle("active");
        }
    </script>
