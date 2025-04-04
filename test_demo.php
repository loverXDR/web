<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Подключаем автозагрузчик классов
require_once __DIR__ . '/vendor/autoload.php';

// Подключаем демо-класс для паттернов проектирования
require_once __DIR__ . '/lab2/demo.php';

try {
    echo "<pre>";
    echo "Testing runAllDemos() method...\n";
    $results = Lab2\PatternDemo::runAllDemos();
    var_dump($results);
    echo "</pre>";
} catch (Exception $e) {
    echo "Exception caught: " . $e->getMessage();
    echo "<br>File: " . $e->getFile();
    echo "<br>Line: " . $e->getLine();
    echo "<br>Trace: <pre>" . $e->getTraceAsString() . "</pre>";
}
?> 