<?php
session_start();
include '../includes/db_TreeBuy.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    try {
        // Добавление нового пользователя в базу данных
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password]);

        // Сообщение об успешной регистрации
        $success = "Регистрация прошла успешно!";

        // Перенаправление на страницу авторизации
        header("Location: avtoriz.php");
        exit();
    } catch (PDOException $e) {
        echo "Ошибка при регистрации: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Авторизация на сайте TreeBuy" />
    <title>TreeBuy - Регистрация</title>
    <link rel="icon" type="image/x-icon" href="../images/TreeBuy.png" />
    <link rel="stylesheet" href="../css/pages/register.css" />
</head>

<body>
    <div class="container">
        <?php include '../includes/header_pages.php'; ?>

        <main class="main">
            <div class="regist">
                <h1 class="name">Регистрация</h1>

                <!-- Сообщение об успешной регистрации -->
                <?php if (!empty($success)): ?>
                <p style="color: green;"><?= htmlspecialchars($success) ?></p>
                <?php endif; ?>

                <form method="POST" action="">
                    <label for="name">Имя:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Зарегистрироваться</button>
                    <!-- Кнопка перехода на страницу авторизации -->
                    <div class="silk-avtoriz">
                        <p>Есть аккаунт? <a href="avtoriz.php" class="silka">Войдите</a></p>
                    </div>
                </form>
            </div>
        </main>

        <?php include '../includes/footer_pages.php'; ?>
    </div>
</body>

</html>