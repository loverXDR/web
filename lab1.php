<?php

declare(strict_types=1);

// Функция автозагрузки
spl_autoload_register(function ($class) {
    $prefix = 'MyProject\\';
    $base_dir = __DIR__ . '/MyProject/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

// Создание обычных пользователей
$user1 = new User("John Doe", "john", "password123");
$user2 = new User("Jane Smith", "jane", "password456");
$user3 = new User("Bob Wilson", "bob", "password789");

// Создание привилегированного пользователя
$superUser = new SuperUser("Admin User", "admin", "adminpass", "Administrator");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система управления пользователями</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        .user-card {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin: 10px 0;
        }
        .super-user-card {
            background-color: #e8f4ff;
            border: 1px solid #b8daff;
        }
        .stats {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 4px;
        }
        .user-info {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Система управления пользователями</h1>
        <h2>Обычные пользователи</h2>
        <?php
        $regularUsers = [$user1, $user2, $user3];
        foreach ($regularUsers as $user) {
            echo '<div class="user-card">';
            echo '<div class="user-info"><strong>Имя:</strong> ' . htmlspecialchars($user->name) . '</div>';
            echo '<div class="user-info"><strong>Логин:</strong> ' . htmlspecialchars($user->login) . '</div>';
            echo '</div>';
        }
        ?>

        <h2>Привилегированный пользователь</h2>
        <div class="user-card super-user-card">
            <?php
            $superUserInfo = $superUser->getInfo();
            foreach ($superUserInfo as $key => $value) {
                $labels = [
                    'name' => 'Имя',
                    'login' => 'Логин',
                    'role' => 'Роль'
                ];
                $label = $labels[$key] ?? ucfirst($key);
                echo '<div class="user-info"><strong>' . $label . ':</strong> ' . htmlspecialchars($value) . '</div>';
            }
            ?>
        </div>

        <div class="stats">
            <h2>Статистика</h2>
            <p>Всего обычных пользователей: <?php echo User::getUserCount(); ?></p>
            <p>Всего привилегированных пользователей: <?php echo SuperUser::getSuperUserCount(); ?></p>
        </div>
    </div>

    <?php
    // Удаление пользователей
    echo '<div class="container" style="margin-top: 20px;">';
    echo '<h2>Удаление пользователей</h2>';
    echo '<div class="user-card">';
    
    // Начинаем буферизацию вывода
    
    
    // Сначала очищаем массив обычных пользователей
    unset($regularUsers);
    
    // Теперь удаляем отдельные переменные пользователей
    unset($user3);
    unset($user2);
    unset($user1);
    
    // В конце удаляем привилегированного пользователя
    unset($superUser);
    
    // Получаем содержимое буфера и очищаем его
    
    
    // Выводим все сообщения внутри блока
    
    echo '</div>';
    echo '</div>';
    ?>
</body>
</html> 