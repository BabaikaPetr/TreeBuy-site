<?php
// Подключаем файл с соединением с базой данных
include 'db_TreeBuy.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    // Вставляем данные в базу данных
    $stmt = $conn->prepare("INSERT INTO info_pages (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);

    echo "Информация была успешно добавлена!";
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Редактировать информацию о сайте</title>
    <link rel="stylesheet" href="../css/pages/info.css" />
</head>

<body>
    <div class="container">
        <h1>Редактировать информацию о сайте</h1>

        <!-- Форма для добавления информации -->
        <form method="POST" action="">
            <label for="title">Заголовок:</label>
            <input type="text" id="title" name="title" required>

            <label for="content">Текст:</label>
            <textarea id="content" name="content" rows="10" required></textarea>

            <button type="submit">Сохранить</button>
        </form>
    </div>
</body>

</html>