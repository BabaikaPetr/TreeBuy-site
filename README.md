# TreeBuy - Онлайн магазин электроники

## Описание проекта

TreeBuy - это веб-сайт онлайн-магазина электроники, разработанный на PHP с использованием MySQL базы данных. Сайт предоставляет функциональность просмотра товаров, регистрации пользователей, авторизации, добавления товаров в корзину и оформления заказов.

## Инструкция по запуску через MAMP

### Требования

- MAMP (бесплатная версия)
- PHP 8.0 или выше
- MySQL 8.0 или выше
- Веб-браузер (Chrome, Firefox, Safari, Edge)

### Пошаговая инструкция

#### Шаг 1: Установка MAMP

1. Скачайте MAMP с официального сайта: https://www.mamp.info/
2. Установите MAMP на ваш компьютер
3. Запустите MAMP

#### Шаг 2: Настройка проекта

1. Скопируйте папку "TreeBuy-site" в директорию htdocs MAMP:
   - **Windows**: `C:\MAMP\htdocs\`
   - **macOS**: `/Applications/MAMP/htdocs/`
   - **Linux**: `/opt/lampp/htdocs/`

#### Шаг 3: Настройка базы данных

1. Откройте MAMP и нажмите "Start Servers"
2. Откройте phpMyAdmin: http://localhost:8888/phpMyAdmin/
   (или http://localhost/phpMyAdmin/ если используете стандартные порты)

3. Создайте новую базу данных:

   - Нажмите "New" (Новая)
   - Введите имя базы данных: `db_pract`
   - Выберите кодировку: `utf8mb4_general_ci`
   - Нажмите "Create" (Создать)

4. Импортируйте структуру и данные:
   - Выберите созданную базу данных `db_pract`
   - Перейдите на вкладку "Import" (Импорт)
   - Нажмите "Choose File" и выберите файл: `db/db_pract.sql`
   - Нажмите "Go" (Выполнить)

#### Шаг 4: Проверка настроек базы данных

1. Откройте файл `includes/db_TreeBuy.php`
2. Убедитесь, что настройки подключения соответствуют MAMP:
   ```php
   host: 'localhost'
   dbname: 'db_pract'
   username: 'root'
   password: 'root' // стандартный пароль MAMP
   ```

#### Шаг 5: Запуск сайта

1. Убедитесь, что серверы MAMP запущены (зеленые индикаторы)
2. Откройте веб-браузер
3. Перейдите по адресу: http://localhost:8888/TreeBuy/
   (или http://localhost/TreeBuy/ если используете стандартные порты)

## Функциональность сайта

### Доступные страницы

- **Главная страница** (`index.php`) - каталог товаров
- **Регистрация** (`pages/register.php`) - создание аккаунта
- **Авторизация** (`pages/avtoriz.php`) - вход в систему
- **Корзина** (`pages/cart.php`) - управление покупками
- **Информация** (`pages/info.php`) - информация о компании

### Функции

- Просмотр каталога товаров
- Регистрация и авторизация пользователей
- Добавление товаров в корзину
- Оформление заказов
- Просмотр истории заказов

## Структура проекта

```
TreeBuy/
├── css/                    # Стили CSS
│   ├── index.css          # Стили главной страницы
│   └── pages/             # Стили для страниц
├── db/                    # База данных
│   └── db_pract.sql       # SQL дамп базы данных
├── fonts/                 # Шрифты
├── images/                # Изображения товаров
├── includes/              # PHP включаемые файлы
│   ├── db_TreeBuy.php     # Подключение к БД
│   ├── header.php         # Шапка сайта
│   ├── footer.php         # Подвал сайта
│   └── ...                # Другие включаемые файлы
├── pages/                 # Страницы сайта
│   ├── avtoriz.php        # Авторизация
│   ├── register.php       # Регистрация
│   ├── cart.php           # Корзина
│   └── info.php           # Информация
└── index.php              # Главная страница
```

## Возможные проблемы и решения

### Проблема: "Ошибка подключения к базе данных"

**Решение:**

- Проверьте, что MAMP запущен
- Убедитесь, что база данных `db_pract` создана
- Проверьте настройки в `includes/db_TreeBuy.php`

### Проблема: "Страница не найдена"

**Решение:**

- Проверьте, что проект находится в папке htdocs
- Убедитесь, что серверы MAMP запущены
- Проверьте правильность URL

### Проблема: "Изображения не отображаются"

**Решение:**

- Проверьте, что папка `images/` содержит все изображения
- Убедитесь, что пути к изображениям в БД корректны

### Проблема: "Ошибка импорта базы данных"

**Решение:**

- Убедитесь, что выбрана правильная кодировка (`utf8mb4`)
- Проверьте, что файл `db_pract.sql` не поврежден
- Попробуйте импортировать по частям

## Техническая информация

### Технологии

- PHP 8.0+
- MySQL 8.0+
- HTML5
- CSS3
- JavaScript

### База данных

- **Таблица `users`** - пользователи
- **Таблица `products`** - товары
- **Таблица `cart`** - корзина
- **Таблица `orders`** - заказы
- **Таблица `info_pages`** - информационные страницы

### Безопасность

- Пароли хешируются с использованием `password_hash()`
- Защита от SQL-инъекций через PDO
- Валидация пользовательского ввода

## Контактная информация

Для получения технической поддержки или сообщения об ошибках:

- **Email**: veramundiya@gmail.com
- **Проект**: TreeBuy - Онлайн магазин электроники

---

**Версия**: 1.0  
**Дата**: Январь 2025

