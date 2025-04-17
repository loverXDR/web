<?php
declare(strict_types=1);

// Autoloader function - assuming index.php setup or similar
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

use MyProject\Classes\NumbersSquared;

// Task 1: Demonstrate NumbersSquared
$startNum = 3;
$endNum = 7;
$numbersSquared = new NumbersSquared($startNum, $endNum);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №5 - Итераторы</title>
    <style>
        /* Copied styles from index.php for consistency */
        :root {
            --primary-color: #4a6da7;
            --secondary-color: #5d93bb;
            --accent-color: #f0ad4e;
            --text-color: #333;
            --light-bg: #f8f9fa;
            --border-color: #ddd;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 960px; /* Adjusted max-width for content focus */
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            color: var(--text-color);
            line-height: 1.6;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
        }

        h1 {
            color: var(--primary-color);
            font-size: 2.2rem; /* Slightly smaller H1 */
            margin-bottom: 10px;
        }

        h2 {
            color: var(--secondary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 5px;
            margin-top: 30px;
        }

        .task-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px var(--shadow-color);
            padding: 20px;
            margin-bottom: 30px;
        }

        pre {
            background-color: var(--light-bg);
            border: 1px solid var(--border-color);
            border-radius: 5px;
            padding: 15px;
            overflow-x: auto;
            font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
            font-size: 0.9rem;
        }

        code {
             font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
        }

        .output {
            border: 1px dashed var(--secondary-color);
            padding: 10px;
            margin-top: 15px;
            background-color: #eef4f8;
        }

        .plantuml-diagram img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: auto;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 4px var(--shadow-color);
        }

        .lab-link { /* Reusing link style */
             display: inline-block;
             background-color: var(--accent-color);
             color: white;
             text-decoration: none;
             padding: 10px 20px;
             border-radius: 5px;
             text-align: center;
             font-weight: bold;
             transition: background-color 0.3s ease;
             margin-top: 15px;
         }

        .lab-link:hover {
            background-color: #e09a3c;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Лабораторная работа №5</h1>
        <p>Standard PHP Library (SPL)</p>
    </header>

    <div class="task-container">
        <p>Standard PHP Library (SPL) - это набор интерфейсов и классов, предназначенных для решения стандартных задач. 
        В данной лабораторной работе рассматриваются интерфейсы для создания итераторов.</p>
    </div>

    <div class="task-container">
        <h2>Задание 1: Класс-итератор NumbersSquared</h2>
        <p>Создан класс <code>MyProject\Classes\NumbersSquared</code>, реализующий интерфейс <code>Iterator</code>. 
        Класс принимает в конструкторе последовательность чисел и возводит их в степень числа 2.</p>
        
        <p>Результат итерации объекта с числами от <?= $startNum ?> до <?= $endNum ?>:</p>
        <div class="output">
            <pre><?php
                foreach($numbersSquared as $num => $square){
                    echo "Квадрат числа $num = $square\n";
                }
            ?></pre>
        </div>

        <h3>Диаграмма классов для NumbersSquared</h3>
        <div class="plantuml-diagram">
            <p>Диаграмма классов, созданная с помощью PlantUML:</p>
            <img src="lab5/diagrams/NumbersSquared.png" alt="Диаграмма классов NumbersSquared">
        </div>
    </div>

    <div class="task-container">
        <h2>Задание 2: ArrayIterator и IteratorAggregate</h2>
        <p>В классе <code>NewsDB</code> (файл <code>news/NewsDB.class.php</code>) реализован интерфейс <code>IteratorAggregate</code>:</p>
        <ul>
            <li>Добавлено закрытое свойство <code>items</code> со значением по умолчанию - пустой массив</li>
            <li>Создан закрытый метод <code>getCategories()</code>, который получает категории из таблицы <code>category</code> базы данных</li>
            <li>Метод <code>getCategories()</code> заполняет массив <code>items</code>, где ключи соответствуют полю <code>id</code>, а значения - полю <code>name</code></li>
            <li>Метод <code>getCategories()</code> вызывается в конструкторе класса</li>
            <li>Реализован метод <code>getIterator()</code>, который возвращает <code>ArrayIterator</code> для свойства <code>items</code></li>
        </ul>
        
        <p>В файле <code>news.php</code> HTML-код между тегами <code>&lt;select&gt;&lt;/select&gt;</code> заменён на цикл <code>foreach</code>, 
        использующий объект <code>$news</code> в качестве итератора.</p>
        
        <p>Проверить работу скрипта <code>news.php</code> можно по ссылке:</p>
        <a href="news/news.php" class="lab-link">Перейти к новостям (news.php)</a>
        
        <h3>Диаграмма классов для NewsDB</h3>
        <div class="plantuml-diagram">
            <p>Диаграмма классов для NewsDB:</p>
            <img src="lab5/diagrams/NewsDB.png" alt="Диаграмма классов NewsDB с IteratorAggregate">
        </div>
    </div>

    <div class="footer">
        <p><a href="index.php">Назад к списку работ</a></p>
        <p>PHP Student Project &copy; <?php echo date('Y'); ?>. Все права защищены.</p>
    </div>
</body>
</html> 