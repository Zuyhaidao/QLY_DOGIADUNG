<nav class="header-bottom">
    <div class="container">
        <ul class="menu-list">
            <li class="menu-list-item"><a href="./index.php" class="menu-link">Trang chủ</a></li>
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
        </ul>
    </div>
</nav>