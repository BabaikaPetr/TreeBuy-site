<?php
    session_start();
    require_once 'includes/db_TreeBuy.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="TreeBuy - удобная площадка для покупок онлайн" />
    <title>TreeBuy - Главная</title>
    <link rel="icon" type="image/x-icon" href="images/TreeBuy.png" />
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
    <div class="container">
        <?php include 'includes/header.php'; ?>

        <main class="main">
            <div class='slogan'>
                <h1> TreeBuy - удобный сервис для покупки электротоваров</h1>
                <button class="silk">
                    <a href="pages/avtoriz.php">Войти в аккаунт</a>
                </button>
            </div>

            <div class="katal">
                <?php
                    $query = "SELECT id, name, description, price, image_url FROM products";
                    $result = $conn->query($query);

                    // Проверяем наличие товаров
                    if ($result && $result->rowCount() > 0) { // rowCount() работает в PDO
                        while ($product = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="card">';
                        echo '<img src="' . htmlspecialchars($product['image_url']) . '" alt="' . htmlspecialchars($product['name']) . '" class="card-img">';
                        echo '<h2 class="card-title">' . htmlspecialchars($product['name']) . '</h2>';
                        echo '<p class="card-price">' . number_format($product['price'], 2, ',', ' ') . ' руб.</p>';
                        echo '<p class="card-description">' . htmlspecialchars($product['description']) . '</p>';
                        echo '<form method="POST" action="includes/add_to_cart.php">';
                        echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($product['id']) . '">';
                        echo '<div class="btn-poz"><button type="submit" class="btn-add-to-cart">Добавить в корзину</button></div>';
                        echo '</form>';
                        echo '</div>';
                        }
                    } else {
                        echo '<p>Нет доступных товаров.</p>';
                    }
                ?>
            </div>

        </main>

        <?php include 'includes/footer.php'; ?>
    </div>
</body>

</html>