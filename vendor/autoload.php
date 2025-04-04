<?php

/**
 * Простой автозагрузчик классов для лабораторной работы №2
 */
spl_autoload_register(function ($class) {
    // Базовый каталог для всех классов проекта
    $baseDir = __DIR__ . '/../';

    // Преобразуем пространство имен в путь к файлу
    $relativePath = str_replace('\\', '/', $class) . '.php';
    
    // Полный путь к файлу
    $file = $baseDir . $relativePath;
    
    // Для отладки: запись в лог-файл
    $logMessage = date('Y-m-d H:i:s') . " - Attempting to load: " . $class . " from: " . $file . "\n";
    error_log($logMessage, 3, __DIR__ . '/../autoloader_debug.log');
    
    // Проверяем существование файла более явно
    if (!file_exists($file)) {
        $errorMsg = "Autoloader: File not found: " . $file . " for class: " . $class;
        error_log($errorMsg, 3, __DIR__ . '/../autoloader_debug.log');
        
        // Попытка исправить регистр директории для стандартных шаблонов
        $parts = explode('/', $relativePath);
        if (count($parts) > 2 && $parts[0] === 'Lab2' && $parts[1] === 'DesignPatterns') {
            // Капитализируем директорию паттерна (Creational, Structural, Behavioral)
            if (isset($parts[2])) {
                $parts[2] = ucfirst(strtolower($parts[2]));
                $newRelativePath = implode('/', $parts);
                $newFile = $baseDir . $newRelativePath;
                
                error_log("Autoloader: Trying with corrected case: " . $newFile, 3, __DIR__ . '/../autoloader_debug.log');
                
                if (file_exists($newFile)) {
                    require $newFile;
                    return true;
                }
            }
        }
        
        return false;
    }

    // Если файл существует, подключаем его
    require $file;
    return true;
}); 