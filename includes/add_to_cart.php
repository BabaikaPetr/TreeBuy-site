<?php
session_start();
require_once(__DIR__ . '/db_TreeBuy.php');

// Проверяем, является ли запрос методом POST и содержит ли он product_id
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    // Проверяем авторизацию пользователя
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../pages/avtoriz.php');
        exit();
    }

    $user_id = $_SESSION['user_id']; // ID авторизованного пользователя
    $product_id = intval($_POST['product_id']); // ID товара

    try {
        // Получаем информацию о товаре из таблицы products
        $product_query = "SELECT id, name, price, image_url FROM products WHERE id = ?";
        $stmt = $conn->prepare($product_query);
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        // Если товар найден
        if ($product) {
            // Проверяем, есть ли товар уже в корзине пользователя
            $cart_check_query = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
            $stmt = $conn->prepare($cart_check_query);
            $stmt->execute([$user_id, $product_id]);
            $cart_item = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($cart_item) {
                // Если товар уже в корзине, увеличиваем его количество
                $update_cart_query = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
                $stmt = $conn->prepare($update_cart_query);
                $stmt->execute([$user_id, $product_id]);
            } else {
                // Если товара нет в корзине, добавляем его
                $insert_cart_query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($insert_cart_query);
                $stmt->execute([$user_id, $product_id, 1]);
            }
        }

        // Синхронизируем корзину в сессии с базой данных
        $sync_cart_query = "
            SELECT c.product_id, p.name, p.price, p.image_url, c.quantity
            FROM cart c
            JOIN products p ON c.product_id = p.id
            WHERE c.user_id = ?";
        $stmt = $conn->prepare($sync_cart_query);
        $stmt->execute([$user_id]);
        $_SESSION['cart'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Возврат на главную страницу или на страницу с товарами
        header('Location: ../index.php');
        exit();
    } catch (PDOException $e) {
        echo "Ошибка базы данных: " . $e->getMessage();
        exit();
    }
} else {
    echo "Ошибка: неверный запрос.";
    exit();
}
?>