<?php
// Lab 3 - Design Patterns Implementation
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №3 - Паттерны проектирования</title>
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

        .pattern-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .pattern-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px var(--shadow-color);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .pattern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px var(--shadow-color);
        }

        .pattern-header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 20px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .pattern-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .pattern-description {
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .pattern-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .pattern-link {
            display: inline-block;
            background-color: var(--accent-color);
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .pattern-link:hover {
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
        <a href="index.php" class="back-link">← Вернуться на главную</a>
        <h1>Лабораторная работа №3</h1>
        <div class="subtitle">Паттерны проектирования: Singleton, Factory Method, MVC</div>
    </header>

    <div class="pattern-container">
        <div class="pattern-card">
            <div class="pattern-header">
                Одиночка (Singleton)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Одиночка (Singleton) гарантирует, что у класса есть только один экземпляр, и предоставляет к нему глобальную точку доступа.</p>
                    <p>В данной реализации создан класс Settings, который может иметь только один экземпляр и хранит различные настройки приложения.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab3/patterns/singleton/settings_use.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Фабричный метод (Factory Method)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Фабричный метод (Factory Method) определяет интерфейс для создания объектов, но позволяет подклассам решать, экземпляры каких классов создавать.</p>
                    <p>В реализации создан абстрактный фабричный класс для создания различных типов пользователей: администраторов, обычных пользователей и менеджеров.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab3/patterns/factory-method/factory_use.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab3/patterns/factory-method/factory-method.html" class="pattern-link" target="_blank">Диаграмма классов</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Модель-Представление-Контроллер (MVC)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн MVC (Model-View-Controller) разделяет приложение на три основных компонента: Модель, Представление и Контроллер.</p>
                    <p>Реализация включает различные представления (HTML, JSON, Text, Markdown) для отображения данных пользователей, контроллер для управления данными и взаимодействия с представлениями.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab3/patterns/mvc/mvc_use.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab3/patterns/mvc/mvc-pattern.html" class="pattern-link" target="_blank">Диаграмма классов</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>PHP Student Project &copy; <?php echo date('Y'); ?>. Все права защищены.</p>
    </div>
</body>
</html> 