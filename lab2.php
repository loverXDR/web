<?php
// Подключаем автозагрузчик классов
require_once __DIR__ . '/vendor/autoload.php';

// Подключаем демо-класс для паттернов проектирования
require_once __DIR__ . '/lab2/demo.php';

// Информация о паттернах проектирования
$patterns = [
    'creational' => [
        'title' => 'Порождающие паттерны',
        'description' => 'Отвечают за удобное и безопасное создание новых объектов или даже целых семейств объектов.',
        'patterns' => [
            [
                'name' => 'Singleton (Одиночка)',
                'description' => 'Гарантирует, что у класса есть только один экземпляр, и предоставляет к нему глобальную точку доступа.',
                'example' => 'Singleton.php',
                'demo' => 'demonstrateSingleton'
            ],
            [
                'name' => 'Factory Method (Фабричный метод)',
                'description' => 'Определяет общий интерфейс для создания объектов в суперклассе, позволяя подклассам изменять тип создаваемых объектов.',
                'example' => 'FactoryMethod.php',
                'demo' => 'demonstrateFactoryMethod'
            ]
        ]
    ],
    'structural' => [
        'title' => 'Структурные паттерны',
        'description' => 'Отвечают за эффективное объединение объектов и классов в более крупные структуры, сохраняя при этом гибкость и эффективность этих структур.',
        'patterns' => [
            [
                'name' => 'Adapter (Адаптер)',
                'description' => 'Позволяет объектам с несовместимыми интерфейсами работать вместе.',
                'example' => 'Adapter.php',
                'demo' => 'demonstrateAdapter'
            ],
            [
                'name' => 'Decorator (Декоратор)',
                'description' => 'Позволяет динамически добавлять объектам новую функциональность, оборачивая их в полезные «обёртки».',
                'example' => 'Decorator.php',
                'demo' => 'demonstrateDecorator'
            ]
        ]
    ],
    'behavioral' => [
        'title' => 'Поведенческие паттерны',
        'description' => 'Определяют взаимодействие между объектами, увеличивая гибкость в коммуникации.',
        'patterns' => [
            [
                'name' => 'Observer (Наблюдатель)',
                'description' => 'Создаёт механизм подписки, позволяющий одним объектам следить и реагировать на события, происходящие в других объектах.',
                'example' => 'Observer.php',
                'demo' => 'demonstrateObserver'
            ],
            [
                'name' => 'Strategy (Стратегия)',
                'description' => 'Определяет семейство схожих алгоритмов и помещает каждый из них в собственный класс, после чего алгоритмы можно взаимозаменять прямо во время исполнения программы.',
                'example' => 'Strategy.php',
                'demo' => 'demonstrateStrategy'
            ]
        ]
    ]
];

// Запускаем демонстрацию, если установлен соответствующий параметр
$demoResults = [];
if (isset($_GET['demo'])) {
    $demo = strtolower($_GET['demo']);
    
    switch ($demo) {
        case 'singleton':
            $demoResults = Lab2\PatternDemo::demonstrateSingleton();
            break;
        case 'factory':
            $demoResults = Lab2\PatternDemo::demonstrateFactoryMethod();
            break;
        case 'adapter':
            $demoResults = Lab2\PatternDemo::demonstrateAdapter();
            break;
        case 'decorator':
            $demoResults = Lab2\PatternDemo::demonstrateDecorator();
            break;
        case 'observer':
            $demoResults = Lab2\PatternDemo::demonstrateObserver();
            break;
        case 'strategy':
            $demoResults = Lab2\PatternDemo::demonstrateStrategy();
            break;
        case 'all':
            $demoResults = Lab2\PatternDemo::runAllDemos();
            break;
    }
}

// Функция для получения исходного кода файла
function getSourceCode($file) {
    // Разбиваем путь на части для правильной капитализации директорий
    $parts = explode('/', $file);
    if (count($parts) > 1) {
        // Капитализируем первую букву директории (Creational, Structural, Behavioral)
        $parts[0] = ucfirst($parts[0]);
    }
    $file = implode('/', $parts);
    
    $file = __DIR__ . '/lab2/DesignPatterns/' . $file;
    if (file_exists($file)) {
        return htmlspecialchars(file_get_contents($file));
    }
    
    // Попытка найти файл с учетом различных вариантов регистра
    $dirname = dirname($file);
    $basename = basename($file);
    
    if (is_dir($dirname)) {
        $files = scandir($dirname);
        foreach ($files as $f) {
            if (strcasecmp($f, $basename) === 0) {
                $correctFile = $dirname . '/' . $f;
                return htmlspecialchars(file_get_contents($correctFile));
            }
        }
    }
    
    return "Файл не найден: $file";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №2 - Паттерны проектирования</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/github.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/languages/php.min.js"></script>
    <style>
        :root {
            --primary-color: #4a6da7;
            --secondary-color: #5d93bb;
            --accent-color: #f0ad4e;
            --text-color: #333;
            --light-bg: #f8f9fa;
            --border-color: #ddd;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --code-bg: #f7f8fb;
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
            margin-bottom: 40px;
        }
        
        h1 {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        h2 {
            color: var(--primary-color);
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-top: 30px;
        }
        
        h3 {
            color: var(--secondary-color);
            margin-top: 20px;
        }
        
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px var(--shadow-color);
            margin-bottom: 30px;
        }
        
        .pattern-group {
            margin-bottom: 40px;
        }
        
        .pattern-card {
            background-color: var(--light-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .pattern-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .pattern-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--primary-color);
            margin: 0;
        }
        
        .pattern-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: var(--accent-color);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #e09a3c;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #3a5c96;
        }
        
        .btn-info {
            background-color: var(--secondary-color);
        }
        
        .btn-info:hover {
            background-color: #4d83ab;
        }
        
        .intro {
            margin-bottom: 30px;
        }
        
        .code-block {
            background-color: var(--code-bg);
            border: 1px solid var(--border-color);
            border-radius: 4px;
            padding: 15px;
            margin: 20px 0;
            overflow-x: auto;
        }
        
        pre {
            margin: 0;
            white-space: pre-wrap;
        }
        
        code {
            font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
            font-size: 0.9rem;
        }
        
        .result-block {
            background-color: #f0f8ff;
            border: 1px solid #b8daff;
            border-radius: 4px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .result-item {
            margin-bottom: 10px;
            line-height: 1.5;
        }
        
        .tabs {
            display: flex;
            margin-top: 20px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border: 1px solid transparent;
            border-bottom: none;
            margin-right: 5px;
            border-radius: 4px 4px 0 0;
        }
        
        .tab.active {
            background-color: white;
            border-color: var(--border-color);
            color: var(--primary-color);
            font-weight: bold;
        }
        
        .tab-content {
            display: none;
            padding: 20px;
            background-color: white;
            border: 1px solid var(--border-color);
            border-top: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .back-link {
            display: inline-block;
            margin: 20px 0;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
        
        .demo-nav {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            gap: 10px;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Паттерны проектирования в PHP</h1>
            <p>Лабораторная работа №2: Изучение и реализация популярных паттернов проектирования в PHP</p>
        </header>
        
        <div class="intro">
            <h2>Введение</h2>
            <p>Паттерны проектирования — это проверенные методики решения распространённых проблем в проектировании программ. Их можно рассматривать как готовые рецепты для решения типичных задач в разработке программного обеспечения.</p>
            <p>В данной лабораторной работе рассмотрим три категории паттернов проектирования и их реализацию в PHP:</p>
            <ul>
                <li><strong>Порождающие паттерны</strong> — отвечают за удобное и безопасное создание новых объектов</li>
                <li><strong>Структурные паттерны</strong> — отвечают за композицию объектов и классов</li>
                <li><strong>Поведенческие паттерны</strong> — определяют коммуникации между объектами</li>
            </ul>
            
            <div class="demo-nav">
                <a href="?demo=all" class="btn btn-primary">Продемонстрировать все паттерны</a>
                <a href="index.php" class="btn">Вернуться на главную</a>
            </div>
        </div>
        
        <?php if (!empty($demoResults)): ?>
        <div class="result-block">
            <h3>Результаты демонстрации паттернов</h3>
            <?php foreach ($demoResults as $result): ?>
                <div class="result-item"><?php echo $result; ?></div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <?php foreach ($patterns as $type => $category): ?>
        <div class="pattern-group">
            <h2><?php echo $category['title']; ?></h2>
            <p><?php echo $category['description']; ?></p>
            
            <?php foreach ($category['patterns'] as $pattern): ?>
            <div class="pattern-card">
                <div class="pattern-header">
                    <h3 class="pattern-title"><?php echo $pattern['name']; ?></h3>
                    <div class="pattern-actions">
                        <a href="#" class="btn btn-info show-code" data-file="<?php echo $type . '/' . $pattern['example']; ?>">Показать код</a>
                        <a href="?demo=<?php echo strtolower(preg_replace('/^demonstrate/', '', $pattern['demo'])); ?>" class="btn btn-primary">Демонстрация</a>
                    </div>
                </div>
                <p><?php echo $pattern['description']; ?></p>
                <div class="code-block" style="display: none;" id="code-<?php echo strtolower(explode(' ', $pattern['name'])[0]); ?>">
                    <pre><code class="language-php"><?php echo getSourceCode($type . '/' . $pattern['example']); ?></code></pre>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </div>
    
    <script>
        // Подсветка синтаксиса
        document.addEventListener('DOMContentLoaded', function() {
            hljs.highlightAll();
            
            // Обработчики для кнопок "Показать код"
            document.querySelectorAll('.show-code').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const fileData = this.dataset.file.split('/');
                    const patternName = fileData[1].split('.')[0].toLowerCase();
                    const codeBlock = document.getElementById('code-' + patternName.toLowerCase());
                    
                    if (codeBlock.style.display === 'none') {
                        codeBlock.style.display = 'block';
                        this.textContent = 'Скрыть код';
                    } else {
                        codeBlock.style.display = 'none';
                        this.textContent = 'Показать код';
                    }
                });
            });
        });
    </script>
</body>
</html> 