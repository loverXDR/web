<?php

namespace Lab2\DesignPatterns\Creational;

/**
 * Factory Method - Порождающий паттерн проектирования, который определяет общий интерфейс 
 * для создания объектов в суперклассе, позволяя подклассам изменять тип создаваемых объектов.
 */

/**
 * Интерфейс Продукта объявляет операции, которые должны выполнять все конкретные продукты.
 */
interface Transport
{
    public function deliver(): string;
}

/**
 * Конкретные Продукты предоставляют различные реализации интерфейса Продукта.
 */
class Truck implements Transport
{
    public function deliver(): string
    {
        return "Доставка грузовиком по дороге.";
    }
}

class Ship implements Transport
{
    public function deliver(): string
    {
        return "Доставка кораблем по морю.";
    }
}

class Plane implements Transport
{
    public function deliver(): string
    {
        return "Доставка самолетом по воздуху.";
    }
}

/**
 * Класс Создатель объявляет фабричный метод, который должен возвращать объект класса Продукт.
 * Подклассы Создателя обычно предоставляют реализацию этого метода.
 */
abstract class Logistics
{
    /**
     * Обратите внимание, что Создатель может также обеспечить реализацию фабричного метода
     * по умолчанию.
     */
    abstract public function createTransport(): Transport;

    /**
     * Также заметьте, что, несмотря на название, основная обязанность Создателя не заключается
     * в создании продуктов. Обычно он содержит некоторую базовую бизнес-логику, которая
     * основана на объектах Продуктов, возвращаемых фабричным методом. Подклассы могут косвенно
     * изменять эту бизнес-логику, переопределяя фабричный метод и возвращая из него другой тип
     * продукта.
     */
    public function planDelivery(): string
    {
        // Вызываем фабричный метод, чтобы получить объект-продукт.
        $transport = $this->createTransport();
        
        // Используем продукт.
        return "Логистика: " . $transport->deliver();
    }
}

/**
 * Конкретные Создатели переопределяют фабричный метод для того, чтобы изменить тип
 * результатного продукта.
 */
class RoadLogistics extends Logistics
{
    public function createTransport(): Transport
    {
        return new Truck();
    }
}

class SeaLogistics extends Logistics
{
    public function createTransport(): Transport
    {
        return new Ship();
    }
}

class AirLogistics extends Logistics
{
    public function createTransport(): Transport
    {
        return new Plane();
    }
} 