-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Янв 30 2025 г., 13:07
-- Версия сервера: 8.0.35
-- Версия PHP: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_pract`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(52, 3, 31, 1, '2025-01-18 21:17:54', '2025-01-18 21:17:54'),
(53, 3, 35, 1, '2025-01-18 21:17:56', '2025-01-18 21:17:56');

-- --------------------------------------------------------

--
-- Структура таблицы `info_pages`
--

CREATE TABLE `info_pages` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `info_pages`
--

INSERT INTO `info_pages` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'История', 'Сайт \"TreeBuy\" был создан группой энтузиастов с целью улучшить покупательский опыт на рынке электроники. Идея заключалась в том, чтобы предложить пользователям удобный, быстрый и безопасный способ приобретения техники, с подробными описаниями товаров, отзывами и сравнением характеристик. Команда уделила большое внимание удобству интерфейса, мобильной версии сайта и высокой скорости работы, обеспечив простоту навигации и безопасные платежи.\n\nС момента запуска TreeBuy активно развивался, внедряя новые функции и улучшая логистику, предлагая разнообразные способы доставки и эксклюзивные акции. Основной акцент был сделан на качество обслуживания и обратную связь с клиентами, что позволило компании занять свою нишу в конкурентном рынке электроники. Сегодня TreeBuy — это надежный онлайн-магазин, который сочетает удобство покупок, конкурентоспособные цены и высокий уровень сервиса.', '2025-01-14 15:42:03');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `price`, `total_price`, `order_date`) VALUES
(1, 1, 29, 1, 126699.00, 126699.00, '2025-01-16 23:41:15'),
(2, 1, 37, 1, 5499.00, 5499.00, '2025-01-16 23:41:15'),
(3, 1, 29, 1, 126699.00, 126699.00, '2025-01-17 15:49:43'),
(4, 1, 27, 1, 2999.00, 2999.00, '2025-01-17 15:49:43'),
(5, 1, 35, 1, 89900.00, 89900.00, '2025-01-17 15:49:43'),
(6, 1, 40, 1, 13774999.00, 13774999.00, '2025-01-17 15:50:04'),
(7, 1, 30, 1, 6999.00, 6999.00, '2025-01-17 18:02:08'),
(8, 1, 47, 1, 129599.00, 129599.00, '2025-01-17 18:02:08'),
(9, 1, 44, 1, 11900.00, 11900.00, '2025-01-17 18:02:08'),
(10, 1, 28, 1, 75999.00, 75999.00, '2025-01-17 18:02:08'),
(11, 3, 32, 1, 12999.00, 12999.00, '2025-01-19 00:16:25'),
(12, 3, 47, 1, 129599.00, 129599.00, '2025-01-19 00:16:25'),
(13, 3, 42, 1, 3499.00, 3499.00, '2025-01-19 00:16:25'),
(14, 1, 25, 1, 41499.00, 41499.00, '2025-01-19 00:19:03'),
(15, 1, 29, 1, 126699.00, 126699.00, '2025-01-19 00:19:03'),
(16, 1, 34, 1, 7490.00, 7490.00, '2025-01-19 00:19:03');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_url`, `created_at`) VALUES
(24, 'AirPods Max', 'AirPods Max — это совершенно новый взгляд на полноразмерные наушники.', 69999.00, 'images/card/airpodsMAX.png', '2025-01-15 20:17:08'),
(25, 'Часы Apple Watch Series 10 42mm', 'Встроенные датчики постоянно отслеживают пульс и уровень кислорода в крови', 41499.00, 'images/card/apple-watch-10.jpg', '2025-01-15 20:17:08'),
(26, 'Ноутбук ASUS Vivobook Go 15 OLED', 'Лёгкий и мощный ноутбук', 64999.00, 'images/card/asus-laptop.jpg', '2025-01-15 20:17:08'),
(27, 'Чайник Xiaomi', 'Умный и красивый чайник от всемирно известного бренда Xiaomi', 2999.00, 'images/card/chainik.jpeg', '2025-01-15 20:17:08'),
(28, 'Фен Dyson', 'Фен Dyson лучший подарок для любой женщины', 75999.00, 'images/card/fen.jpg', '2025-01-15 20:17:08'),
(29, 'Смартфон Samsung Galaxy S24 256 ГБ', 'Смартфон Samsung Galaxy S24 Ultra оборудован 4-модульной камерой с поддержкой 100-кратного цифрового зума. ', 126699.00, 'images/card/galaxy.png', '2025-01-15 20:17:08'),
(30, 'Наушники JBL', 'Отличные наушники для занятий спортом от проверенного временем бренда', 6999.00, 'images/card/jbl.png', '2025-01-15 20:17:08'),
(31, 'Ноутбук Apple MacBook Air 13\"', '(M1, 8Gb, 256Gb SSD) Серый космос (MGN63) Русифицированный', 71890.00, 'images/card/macbook.jpg', '2025-01-15 20:17:08'),
(32, 'Наушники Marshall Major 4', 'Легендарная модель наушников с отличным звуком', 12999.00, 'images/card/marshall.png', '2025-01-15 20:17:08'),
(33, 'Мышь беспроводная Logitech MX Master 3s', 'Выбор профессионалов', 9799.00, 'images/card/mouse.png', '2025-01-15 20:17:08'),
(34, 'Мультиварка Polaris PMC 0578AD', '300 режимов приготовления с функцией - Мой рецепт plus.', 7490.00, 'images/card/multivar.jpg', '2025-01-15 20:17:08'),
(35, 'Телефон Apple iPhone 16 128Gb', 'iPhone 16 создан для Apple Intelligence', 89900.00, 'images/card/iphone-16.png', '2025-01-15 20:17:08'),
(36, 'Автомобильный навигатор', 'Навигатор поможет найти дорогу где угодно, карты устанавливаются заранее', 1499.00, 'images/card/navigator.jpg', '2025-01-15 20:17:08'),
(37, 'Очиститель воздуха Xiaomi', 'Очиститель воздуха помогает убрать из вохдуха пыль, аллергены и другие различные загрязнения', 5499.00, 'images/card/ochivoz.jpg', '2025-01-15 20:17:08'),
(38, 'Паяльник', 'Паяльник - самая необходимая вещь для любого электрика!', 699.00, 'images/card/paylnik.jpg', '2025-01-15 20:17:08'),
(39, 'Игровая приставка Sony Playstation 5 825Gb (Белая)', 'Sony PlayStation 5 – долгожданная модель среди миллионов геймеров.', 61900.00, 'images/card/sony_playatation_5.png', '2025-01-15 20:17:08'),
(40, 'Tesla Model S', 'Быстрый и практичный электрокар', 13774999.00, 'images/card/tesla.png', '2025-01-15 20:17:08'),
(41, 'Телевизор Supra 50\" (SmartTV)', 'Телевизор оборудован SmartTV c поддержкой голосового управления Яндекс Алиса', 26799.00, 'images/card/TV.jpg', '2025-01-15 20:17:08'),
(42, 'Утюг', 'Утюг с функцией вертикального отпаривания', 3499.00, 'images/card/utug.jpg', '2025-01-15 20:17:08'),
(43, 'Увлажнитель воздуха KitFort', 'Незаменимая вещь для жизни в мегаполисе или в сухом климате', 4999.00, 'images/card/uvlajvoz.png', '2025-01-15 20:17:08'),
(44, 'Пылесос строительный Karcher', 'Мощный пылесос', 11900.00, 'images/card/vacumcleaner.jpg', '2025-01-15 20:17:08'),
(45, 'Видеокарта Geeforce RTX 4060 8GB', 'Лучшая видеокарта для игр', 42999.00, 'images/card/videocard.png', '2025-01-15 20:17:08'),
(46, 'Игровая консоль Microsoft Xbox Series X', 'Игровая консоль Microsoft Xbox Series X даёт возможность играть в любые игры  ', 64999.00, 'images/card/xbox-x.jpg', '2025-01-15 20:17:08'),
(47, 'Смартфон Apple iPhone 16 Pro 256 ГБ', 'Смартфон Apple iPhone 16 Pro выкован из титана', 129599.00, 'images/card/iphone-15-pro.png', '2025-01-15 21:50:50');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Вера', 'veramundiya@gmail.com', '$2y$10$oH/4efm2a99HogmrC0vJ1.HOttOahhvtOscCv5lZFa5hDSl9BMvEO', '2025-01-16 15:19:43'),
(2, 'Лев ', 'lev@lev', '$2y$10$k0fyy.T0Wb4hK8Y7ZKhMBen137pDHaqTS08vZhI01VNlkWv1ig6vu', '2025-01-16 15:33:39'),
(3, ' маргарита', 'StegozavrTolya@mail.ru', '$2y$10$Gwip3EGZTBeXn/PGEMTdvu0T2MLjbs0nXZUlUuS1CFCyQKV8s7rv6', '2025-01-18 21:12:59'),
(4, 'pupka', 'veramundiya@gmail.comm', '$2y$10$dDOAc37DwXX6VnGHAgA9ReGIFqWGdhCR7w2ugSAv5951ve4oDf8ny', '2025-01-22 12:39:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `info_pages`
--
ALTER TABLE `info_pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `info_pages`
--
ALTER TABLE `info_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
