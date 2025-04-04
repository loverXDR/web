<?php

namespace Lab2\DesignPatterns\Creational;

/**
 * Singleton - Порождающий паттерн, который гарантирует, что у класса
 * есть только один экземпляр, и предоставляет глобальную точку доступа к этому экземпляру.
 */
class Singleton
{
    /**
     * Статическое свойство, которое хранит единственный экземпляр класса.
     */
    private static $instance = null;
    
    /**
     * Информация о подключении к базе данных
     */
    private $connectionInfo;
    
    /**
     * Приватный конструктор, чтобы предотвратить создание экземпляра извне.
     */
    private function __construct()
    {
        // Симуляция настройки подключения к базе данных
        $this->connectionInfo = [
            'host' => 'localhost',
            'database' => 'students_db',
            'username' => 'root',
            'password' => 'secret',
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        echo "Инициализация подключения к базе данных.<br>";
    }
    
    /**
     * Запрещаем клонирование объекта.
     */
    private function __clone() {}
    
    /**
     * Запрещаем десериализацию объекта.
     */
    public function __wakeup() {}
    
    /**
     * Статический метод, который контролирует доступ к единственному экземпляру.
     * 
     * @return Singleton
     */
    public static function getInstance(): Singleton
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    /**
     * Получить информацию о подключении
     */
    public function getConnectionInfo(): array
    {
        return $this->connectionInfo;
    }
    
    /**
     * Выполнить запрос к базе данных (имитация)
     */
    public function query(string $sql): string
    {
        return "Выполнение запроса: " . $sql;
    }
} 