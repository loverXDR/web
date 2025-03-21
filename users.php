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

// Отображение информации обо всех пользователях
echo "\nИнформация об обычных пользователях:\n";
echo "--------------------------------\n";
$user1->showInfo();
echo "\n";
$user2->showInfo();
echo "\n";
$user3->showInfo();
echo "\n";

echo "Информация о привилегированном пользователе:\n";
echo "----------------------------------------\n";
$superUser->showInfo();
echo "\n";

// Отображение информации о привилегированном пользователе через getInfo()
echo "Детальная информация о привилегированном пользователе:\n";
echo "------------------------------------------------\n";
print_r($superUser->getInfo());
echo "\n";

// Отображение общего количества пользователей
echo "\nСтатистика:\n";
echo "-----------\n";
echo "Всего обычных пользователей: " . User::getUserCount() . "\n";
echo "Всего привилегированных пользователей: " . SuperUser::getSuperUserCount() . "\n"; 