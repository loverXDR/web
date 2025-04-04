<?php

namespace Lab2;

require_once __DIR__ . "/../vendor/autoload.php";

use Lab2\DesignPatterns\Creational\Singleton;
use Lab2\DesignPatterns\Creational\RoadLogistics;
use Lab2\DesignPatterns\Creational\SeaLogistics;
use Lab2\DesignPatterns\Creational\AirLogistics;
use Lab2\DesignPatterns\Structural\AudioPlayer;
use Lab2\DesignPatterns\Structural\SimpleCoffee;
use Lab2\DesignPatterns\Structural\MilkDecorator;
use Lab2\DesignPatterns\Structural\WhipDecorator;
use Lab2\DesignPatterns\Structural\ChocolateDecorator;
use Lab2\DesignPatterns\Behavioral\WeatherStation;
use Lab2\DesignPatterns\Behavioral\CurrentConditionsDisplay;
use Lab2\DesignPatterns\Behavioral\StatisticsDisplay;
use Lab2\DesignPatterns\Behavioral\ShoppingCart;
use Lab2\DesignPatterns\Behavioral\CreditCardStrategy;
use Lab2\DesignPatterns\Behavioral\PayPalStrategy;
use Lab2\DesignPatterns\Behavioral\BitcoinStrategy;

/**
 * Демонстрация паттернов проектирования
 */
class PatternDemo
{
    /**
     * Демонстрация работы паттерна Singleton
     */
    public static function demonstrateSingleton(): array
    {
        $results = [];
        
        $results[] = "<h3>Результаты выполнения Singleton:</h3>";
        
        // Получаем экземпляр Singleton
        $db1 = Singleton::getInstance();
        $results[] = "Первое подключение создано";
        
        // Получаем тот же экземпляр Singleton
        $db2 = Singleton::getInstance();
        $results[] = "Второе подключение получено";
        
        // Проверяем, являются ли они одним и тем же объектом
        if ($db1 === $db2) {
            $results[] = "Оба объекта указывают на один и тот же экземпляр Singleton.";
        }
        
        // Используем экземпляр Singleton
        $connectionInfo = $db1->getConnectionInfo();
        $results[] = "Информация о подключении: " . json_encode($connectionInfo, JSON_UNESCAPED_UNICODE);
        
        // Выполняем запрос
        $queryResult = $db1->query("SELECT * FROM users");
        $results[] = $queryResult;
        
        return $results;
    }
    
    /**
     * Демонстрация работы паттерна Factory Method
     */
    public static function demonstrateFactoryMethod(): array
    {
        $results = [];
        
        $results[] = "<h3>Результаты выполнения Factory Method:</h3>";
        
        // Создаем различные типы логистики
        $roadLogistics = new RoadLogistics();
        $seaLogistics = new SeaLogistics();
        $airLogistics = new AirLogistics();
        
        // Проверяем планирование доставки с помощью разных типов транспорта
        $results[] = $roadLogistics->planDelivery();
        $results[] = $seaLogistics->planDelivery();
        $results[] = $airLogistics->planDelivery();
        
        return $results;
    }
    
    /**
     * Демонстрация работы паттерна Adapter
     */
    public static function demonstrateAdapter(): array
    {
        $results = [];
        
        $results[] = "<h3>Результаты выполнения Adapter:</h3>";
        
        // Создаем аудиоплеер
        $audioPlayer = new AudioPlayer();
        
        // Проигрываем различные форматы
        $results[] = $audioPlayer->play("mp3", "beyond_the_horizon.mp3");
        $results[] = $audioPlayer->play("mp4", "alone.mp4");
        $results[] = $audioPlayer->play("vlc", "far_far_away.vlc");
        $results[] = $audioPlayer->play("avi", "mind_me.avi");
        
        return $results;
    }
    
    /**
     * Демонстрация работы паттерна Decorator
     */
    public static function demonstrateDecorator(): array
    {
        $results = [];
        
        $results[] = "<h3>Результаты выполнения Decorator:</h3>";
        
        // Создаем простой кофе
        $simpleCoffee = new SimpleCoffee();
        $results[] = "Заказ: " . $simpleCoffee->getDescription() . ", Стоимость: " . $simpleCoffee->getCost() . " руб.";
        
        // Добавляем молоко к кофе
        $milkCoffee = new MilkDecorator($simpleCoffee);
        $results[] = "Заказ: " . $milkCoffee->getDescription() . ", Стоимость: " . $milkCoffee->getCost() . " руб.";
        
        // Добавляем взбитые сливки к кофе с молоком
        $whipMilkCoffee = new WhipDecorator($milkCoffee);
        $results[] = "Заказ: " . $whipMilkCoffee->getDescription() . ", Стоимость: " . $whipMilkCoffee->getCost() . " руб.";
        
        // Создаем кофе с шоколадом и взбитыми сливками
        $specialCoffee = new ChocolateDecorator(new WhipDecorator(new SimpleCoffee()));
        $results[] = "Заказ: " . $specialCoffee->getDescription() . ", Стоимость: " . $specialCoffee->getCost() . " руб.";
        
        return $results;
    }
    
    /**
     * Демонстрация работы паттерна Observer
     */
    public static function demonstrateObserver(): array
    {
        $results = [];
        
        $results[] = "<h3>Результаты выполнения Observer:</h3>";
        
        // Создаем метеостанцию (издатель)
        $weatherStation = new WeatherStation();
        
        // Создаем дисплеи (наблюдатели)
        $currentDisplay = new CurrentConditionsDisplay();
        $statisticsDisplay = new StatisticsDisplay();
        
        // Регистрируем наблюдателей
        $weatherStation->attach($currentDisplay);
        $weatherStation->attach($statisticsDisplay);
        
        // Симулируем изменение погоды
        $results[] = "Изменение погоды (температура 25.2, влажность 65.0, давление 1012.1):";
        $weatherStation->setMeasurements(25.2, 65.0, 1012.1);
        $results[] = $currentDisplay->display();
        $results[] = $statisticsDisplay->display();
        
        $results[] = "Изменение погоды (температура 26.7, влажность 70.0, давление 1010.2):";
        $weatherStation->setMeasurements(26.7, 70.0, 1010.2);
        $results[] = $currentDisplay->display();
        $results[] = $statisticsDisplay->display();
        
        return $results;
    }
    
    /**
     * Демонстрация работы паттерна Strategy
     */
    public static function demonstrateStrategy(): array
    {
        $results = [];
        
        $results[] = "<h3>Результаты выполнения Strategy:</h3>";
        
        // Создаем корзину покупок
        $cart = new ShoppingCart();
        
        // Добавляем товары
        $cart->addItem("Ноутбук", 45000, 1);
        $cart->addItem("Мышь", 1500, 1);
        $cart->addItem("USB Флешка", 800, 2);
        
        $results[] = "Товары добавлены в корзину. Общая сумма: " . $cart->calculateTotal() . " руб.";
        
        // Оплата кредитной картой
        $cart->setPaymentStrategy(new CreditCardStrategy("Иван Иванов", "1234567890123456", "123", "12/24"));
        $results[] = $cart->checkout();
        
        // Оплата через PayPal
        $cart->setPaymentStrategy(new PayPalStrategy("ivan@example.com", "password123"));
        $results[] = $cart->checkout();
        
        // Оплата через Bitcoin
        $cart->setPaymentStrategy(new BitcoinStrategy("1BvBMSEYstWetqTFn5Au4m4GFg7xJaNVN2"));
        $results[] = $cart->checkout();
        
        return $results;
    }
    
    /**
     * Запускает демонстрацию всех паттернов
     */
    public static function runAllDemos(): array
    {
        $results = [];
        
        $results = array_merge($results, self::demonstrateSingleton());
        $results = array_merge($results, self::demonstrateFactoryMethod());
        $results = array_merge($results, self::demonstrateAdapter());
        $results = array_merge($results, self::demonstrateDecorator());
        $results = array_merge($results, self::demonstrateObserver());
        $results = array_merge($results, self::demonstrateStrategy());
        
        return $results;
    }
} 