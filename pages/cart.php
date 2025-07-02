<?php
session_start();
require_once(__DIR__ . '/../includes/db_TreeBuy.php');  // Подключение к базе данных

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header('Location: ../pages/avtoriz.php');
    exit();
}

$user_id = $_SESSION['user_id']; // ID пользователя

// Получение данных корзины
$query = "
    SELECT c.product_id, p.name, p.price, p.image_url, c.quantity
    FROM cart c
    JOIN products p ON c.product_id = p.id
    WHERE c.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$user_id]);
$cart = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_price = array_reduce($cart, function ($sum, $item) {
    return $sum + $item['price'] * $item['quantity'];
}, 0);

// Удаление товара из корзины
if (isset($_GET['remove'])) {
    $product_id = intval($_GET['remove']);
    $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->execute([$user_id, $product_id]);
    header('Location: cart.php');
    exit();
}

// Очистка корзины
if (isset($_GET['clear'])) {
    $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
    $stmt->execute([$user_id]);
    header('Location: cart.php');
    exit();
}

// Оформление заказа
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['place_order'])) {
    try {
        if (empty($cart)) {
            $_SESSION['message'] = 'Корзина пуста. Оформление заказа невозможно.';
        } else {
            foreach ($cart as $item) {
                $order_query = "
                    INSERT INTO orders (user_id, product_id, quantity, price, total_price, order_date)
                    VALUES (?, ?, ?, ?, ?, NOW())
                ";
                $stmt = $conn->prepare($order_query);
                $stmt->execute([
                    $user_id,
                    $item['product_id'],
                    $item['quantity'],
                    $item['price'],
                    $item['price'] * $item['quantity']
                ]);
            }

            // Очистка корзины после оформления заказа
            $clear_cart_query = "DELETE FROM cart WHERE user_id = ?";
            $stmt = $conn->prepare($clear_cart_query);
            $stmt->execute([$user_id]);

            // Сообщение об успешном заказе
            $_SESSION['message'] = 'Ваш заказ успешно оформлен! Спасибо за покупку.';
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = 'Ошибка при оформлении заказа: ' . $e->getMessage();
    }

    // Оставляем пользователя на той же странице
    header('Location: cart.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Корзина на сайте TreeBuy" />
    <title>TreeBuy - Корзина</title>
    <link rel="icon" type="image/x-icon" href="../images/TreeBuy.png" />
    <link rel="stylesheet" href="../css/pages/cart.css" />
</head>

<body>
    <div class="container">
        <?php include '../includes/header_pages.php'; ?>

        <main class="main">
            <div class="korzin">
                <div class="info-tov">
                    <h1>Корзина</h1>
                    <?php if (!empty($cart)): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Товар</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                <th>Сумма</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart as $item): ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars($item['name']) ?>
                                </td>
                                <td><?= number_format($item['price'], 2, ',', ' ') ?> руб.</td>
                                <td><?= htmlspecialchars($item['quantity']) ?></td>
                                <td><?= number_format($item['price'] * $item['quantity'], 2, ',', ' ') ?> руб.</td>
                                <td><a href="?remove=<?= $item['product_id'] ?>">Удалить</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="niz-cart">
                    <div class="kupit">
                        <p>Итого: <?= number_format($total_price, 2, ',', ' ') ?> руб.</p>
                        <form method="POST" action="">
                            <button type="submit" name="place_order" class="btn-kupit">Оформить заказ</button>
                        </form>
                    </div>
                    <button class="btn-ochist"><a href="?clear=1">Очистить корзину</a></button>
                </div>
                <?php else: ?>
                <p class="non-cart">Ваша корзина пуста.</p>
                <button class="silk-cart">
                    <a href="../index.php">Вернуться к каталогу</a>
                </button>
                <?php endif; ?>

            </div>
        </main>


        <?php include '../includes/footer_pages.php'; ?>
    </div>
    <?php include '../includes/modal-okno.php'; ?>
</body>

</html>