<?php
    $host = 'localhost';
    $dbname = 'db_pract';
    $username = 'root';
    $password = 'root';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Ошибка подключения к базе данных: " . $e->getMessage();
        exit();
    }
?>