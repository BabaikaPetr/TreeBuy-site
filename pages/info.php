<?php
session_start();
include '../includes/db_TreeBuy.php'; 

// Выполнение запроса
$stmt = $conn->query("SELECT title, content FROM info_pages LIMIT 1");

// Получение данных
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// Проверка наличия данных
if ($data) {
    $title = htmlspecialchars($data['title']);
    $content = htmlspecialchars($data['content']);
} else {
    $title = "Данные отсутствуют";
    $content = "Содержание недоступно.";
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Информация о TreeBuy" />
    <title>TreeBuy - О нас</title>
    <link rel="icon" type="image/x-icon" href="../images/TreeBuy.png" />
    <link rel="stylesheet" href="../css/pages/info.css" />
</head>

<body>
    <div class="container">
        <?php include '../includes/header_pages.php'; ?>

        <main class="main">
            <div class="informat">
                <h1><?php echo $title; ?></h1>
                <p><?php echo $content; ?></p>
            </div>

            <div class="svyazes">
                <div class="contact">
                    <h2>Контакты:</h2>

                    <p><img class="img" src="../images/cont-tel.png" alt="tel" />+7 (925) 625
                        20-39</p>
                </div>
            </div>

        </main>

        <?php include '../includes/footer_pages.php'; ?>
    </div>
</body>

</html>