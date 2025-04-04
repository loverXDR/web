<?php
// Lab 2 - Design Patterns Implementation
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №2 - Паттерны проектирования</title>
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

        .section-title {
            color: var(--primary-color);
            font-size: 1.8rem;
            margin: 30px 0 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--border-color);
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
        <h1>Лабораторная работа №2</h1>
        <div class="subtitle">Паттерны проектирования</div>
    </header>

    <h2 class="section-title">Порождающие паттерны</h2>
    <div class="pattern-container">
        <div class="pattern-card">
            <div class="pattern-header">
                Фабричный метод (Factory Method)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Фабричный метод определяет интерфейс для создания объекта, но позволяет подклассам решать, какой класс инстанцировать.</p>
                    <p>Фабричный метод позволяет классу делегировать создание экземпляров подклассам.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/FactoryMethod/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/FactoryMethod/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Абстрактная фабрика (Abstract Factory)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Абстрактная фабрика предоставляет интерфейс для создания семейств взаимосвязанных или взаимозависимых объектов, не указывая их конкретных классов.</p>
                    <p>Позволяет создавать объекты, следуя общему интерфейсу.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/AbstractFactory/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/AbstractFactory/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Строитель (Builder)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Строитель отделяет конструирование сложного объекта от его представления так, что в результате одного и того же процесса конструирования могут получаться разные представления.</p>
                    <p>Позволяет создавать сложные объекты шаг за шагом.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Builder/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Builder/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Прототип (Prototype)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Прототип позволяет копировать объекты, не вдаваясь в подробности их реализации.</p>
                    <p>Используется для создания дубликата существующего объекта вместо создания нового экземпляра.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Prototype/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Prototype/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Одиночка (Singleton)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Одиночка гарантирует, что у класса есть только один экземпляр, и предоставляет к нему глобальную точку доступа.</p>
                    <p>Обеспечивает контроль доступа к единственному экземпляру класса.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Singleton/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Singleton/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>
    </div>

    <h2 class="section-title">Структурные паттерны</h2>
    <div class="pattern-container">
        <div class="pattern-card">
            <div class="pattern-header">
                Адаптер (Adapter)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Адаптер позволяет объектам с несовместимыми интерфейсами работать вместе.</p>
                    <p>Преобразует интерфейс одного класса в интерфейс другого, который ожидают клиенты.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Adapter/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Adapter/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Мост (Bridge)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Мост отделяет абстракцию от её реализации, что позволяет изменять их независимо друг от друга.</p>
                    <p>Разделяет один или несколько классов на две отдельные иерархии: абстракцию и реализацию.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Bridge/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Bridge/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Компоновщик (Composite)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Компоновщик объединяет объекты в древовидную структуру для представления иерархии от частного к целому.</p>
                    <p>Позволяет клиентам одинаково обращаться как к отдельным объектам, так и к группам объектов.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Composite/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Composite/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Декоратор (Decorator)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Декоратор динамически добавляет объекту новые обязанности, представляя гибкую альтернативу наследованию.</p>
                    <p>Позволяет добавлять новые функциональные возможности объектам, не изменяя их структуру.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Decorator/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Decorator/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Фасад (Facade)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Фасад предоставляет унифицированный интерфейс к набору интерфейсов в подсистеме.</p>
                    <p>Определяет интерфейс более высокого уровня, который упрощает использование подсистемы.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Facade/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Facade/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Легковес (Flyweight)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Легковес использует разделение для эффективной поддержки множества мелких объектов.</p>
                    <p>Позволяет вместить большее количество объектов в отведённую оперативную память, разделяя общее состояние объектов.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Flyweight/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Flyweight/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Заместитель (Proxy)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Заместитель предоставляет суррогат или заместитель другого объекта для контроля доступа к нему.</p>
                    <p>Представляет объект, который выступает в роли интерфейса к другому объекту.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Proxy/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Proxy/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>
    </div>

    <h2 class="section-title">Поведенческие паттерны</h2>
    <div class="pattern-container">
        <div class="pattern-card">
            <div class="pattern-header">
                Цепочка обязанностей (Chain of Responsibility)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Цепочка обязанностей избегает связывания отправителя запроса с его получателем, позволяя более чем одному объекту обработать запрос.</p>
                    <p>Связывает объекты-получатели в цепочку и передает запрос по цепочке, пока его не обработает какой-либо объект.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/ChainOfResponsibility/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/ChainOfResponsibility/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Команда (Command)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Команда инкапсулирует запрос как объект, позволяя параметризовать клиентов разными запросами, ставить запросы в очередь и поддерживать отмену операций.</p>
                    <p>Превращает запрос в отдельный объект, содержащий всю информацию о запросе.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Command/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Command/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Итератор (Iterator)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Итератор предоставляет способ последовательного доступа к элементам составного объекта, не раскрывая его внутреннего представления.</p>
                    <p>Позволяет перебирать элементы коллекции без раскрытия ее реализации.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Iterator/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Iterator/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Посредник (Mediator)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Посредник определяет объект, инкапсулирующий способ взаимодействия множества объектов.</p>
                    <p>Обеспечивает слабую связанность системы, избавляя объекты от необходимости ссылаться друг на друга.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Mediator/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Mediator/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Снимок (Memento)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Снимок фиксирует и инкапсулирует внутреннее состояние объекта, чтобы объект можно было восстановить в этом состоянии позже.</p>
                    <p>Позволяет сохранять и восстанавливать прежнее состояние объекта без нарушения инкапсуляции.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Memento/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Memento/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Наблюдатель (Observer)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Наблюдатель определяет зависимость "один-ко-многим" между объектами так, что при изменении состояния одного объекта все зависящие от него объекты уведомляются и автоматически обновляются.</p>
                    <p>Позволяет объектам оповещать другие объекты об изменениях своего состояния.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Observer/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Observer/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Состояние (State)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Состояние позволяет объекту изменять свое поведение при изменении его внутреннего состояния.</p>
                    <p>Объект будет выглядеть так, как будто он изменил свой класс.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/State/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/State/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Стратегия (Strategy)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Стратегия определяет семейство алгоритмов, инкапсулирует каждый из них и делает их взаимозаменяемыми.</p>
                    <p>Позволяет клиенту выбирать подходящий алгоритм из семейства алгоритмов.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Strategy/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Strategy/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Шаблонный метод (Template Method)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Шаблонный метод определяет скелет алгоритма в методе, откладывая определение некоторых шагов на подклассы.</p>
                    <p>Позволяет подклассам переопределять шаги алгоритма, не изменяя его структуру.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/TemplateMethod/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/TemplateMethod/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>

        <div class="pattern-card">
            <div class="pattern-header">
                Посетитель (Visitor)
            </div>
            <div class="pattern-content">
                <div class="pattern-description">
                    <p>Паттерн Посетитель представляет операцию, которая выполняется над элементами объектной структуры.</p>
                    <p>Позволяет определить новую операцию без изменения классов элементов, над которыми она работает.</p>
                </div>
                <div class="pattern-links">
                    <a href="lab2/Visitor/RealWorld/index.php" class="pattern-link" target="_blank">Посмотреть демонстрацию</a>
                    <a href="lab2/Visitor/Conceptual/index.php" class="pattern-link" target="_blank">Концептуальный пример</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>PHP Student Project &copy; <?php echo date('Y'); ?>. Все права защищены.</p>
    </div>
</body>
</html>
