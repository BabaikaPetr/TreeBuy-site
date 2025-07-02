<header class="header">
    <a class="logo" href="../index.php">
        <img src="../images/TreeBuy.png" alt="Логотип" />
    </a>
    <nav class="navigation">
        <ul>
            <li><a href="../index.php">Главная</a></li>
            <li><a href="info.php">О нас</a></li>
            <li><a href="avtoriz.php">Профиль</a></li>
        </ul>
    </nav>
    <div class="cart-info">
        <img class="fot-cart" src="../images/cart.png" alt="Корзина" />
        <a href="cart.php">Корзина: </a>
        <span id="cart-count">
            <?php
        // Проверка, есть ли корзина в сессии
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            // Считаем общее количество товаров в корзине
            $total_quantity = 0;
            foreach ($_SESSION['cart'] as $item) {
                $total_quantity += $item['quantity'];
            }
            echo $total_quantity;
        } else {
            echo 0;
        }
        ?>
        </span>
    </div>
</header>