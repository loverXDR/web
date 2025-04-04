<?php
// Лабораторная работа №4 - Работа с файлами и сессиями
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №4 - Работа с файлами и сессиями</title>
    <style>
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            color: var(--text-color);
            line-height: 1.6;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            color: var(--primary-color);
            font-size: 2.2rem;
            margin-bottom: 10px;
        }

        .subtitle {
            color: var(--secondary-color);
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .section-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px var(--shadow-color);
            margin-bottom: 30px;
        }

        .section-title {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-top: 0;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--border-color);
        }

        .description {
            margin-bottom: 30px;
        }

        .demo-link {
            display: inline-block;
            background-color: var(--accent-color);
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .demo-link:hover {
            background-color: #e09a3c;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
            color: #666;
        }
        
        .diagram-container {
            margin: 30px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <a href="index.php" class="back-link">← Вернуться на главную</a>
        <h1>Лабораторная работа №4</h1>
        <div class="subtitle">Работа с файлами и сессиями</div>
    </header>

    <div class="section-container">
        <h2 class="section-title">Новостная система</h2>
        <div class="description">
            <p>В рамках данной лабораторной работы реализована система управления новостями с использованием базы данных SQLite.</p>
            <p>Реализован класс NewsDB, который позволяет работать с новостной системой через интерфейс INewsDB.</p>
            <p>Система размещена в каталоге <code>news/</code> и доступна по ссылке:</p>
        </div>
        <a href="./news/news.php" class="demo-link" target="_blank">Перейти к новостной системе</a>
    </div>

    <div class="section-container">
        <h2 class="section-title">Диаграмма классов</h2>
        <div class="diagram-container">
            <img src="news/images/NewsSystem.png" alt="Диаграмма классов новостной системы" style="max-width: 100%; margin: 0 auto; display: block;">
        </div>
    </div>

    <div class="footer">
        <p>PHP Student Project &copy; <?php echo date('Y'); ?>. Все права защищены.</p>
    </div>
</body>
</html> 