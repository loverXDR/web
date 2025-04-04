<?php

namespace Lab2\DesignPatterns\Structural;

/**
 * Decorator - Структурный паттерн проектирования, который позволяет динамически добавлять
 * объектам новую функциональность, оборачивая их в полезные «обёртки».
 */

/**
 * Базовый интерфейс Компонента определяет поведение, которое изменяют декораторы.
 */
interface Coffee
{
    public function getDescription(): string;
    public function getCost(): float;
}

/**
 * Конкретный Компонент предоставляет реализацию базового поведения по умолчанию.
 * У нас может быть несколько вариаций этих классов.
 */
class SimpleCoffee implements Coffee
{
    public function getDescription(): string
    {
        return "Обычный кофе";
    }

    public function getCost(): float
    {
        return 10.0;
    }
}

/**
 * Базовый класс Декоратора следует тому же интерфейсу, что и другие компоненты.
 * Основная цель этого класса - определить интерфейс обёртки для всех конкретных декораторов.
 * Реализация кода обёртки по умолчанию может включать в себя поле для хранения
 * завёрнутого компонента и средства его инициализации.
 */
abstract class CoffeeDecorator implements Coffee
{
    /**
     * @var Coffee
     */
    protected $decoratedCoffee;

    public function __construct(Coffee $coffee)
    {
        $this->decoratedCoffee = $coffee;
    }

    public function getDescription(): string
    {
        return $this->decoratedCoffee->getDescription();
    }

    public function getCost(): float
    {
        return $this->decoratedCoffee->getCost();
    }
}

/**
 * Конкретные Декораторы вызывают обёрнутый объект и изменяют его результат
 * некоторым образом.
 */
class MilkDecorator extends CoffeeDecorator
{
    public function getDescription(): string
    {
        return $this->decoratedCoffee->getDescription() . ", с молоком";
    }

    public function getCost(): float
    {
        return $this->decoratedCoffee->getCost() + 2.0;
    }
}

/**
 * Декораторы могут выполнять своё поведение до или после вызова обёрнутого объекта.
 */
class WhipDecorator extends CoffeeDecorator
{
    public function getDescription(): string
    {
        return $this->decoratedCoffee->getDescription() . ", со взбитыми сливками";
    }

    public function getCost(): float
    {
        return $this->decoratedCoffee->getCost() + 3.0;
    }
}

class ChocolateDecorator extends CoffeeDecorator
{
    public function getDescription(): string
    {
        return $this->decoratedCoffee->getDescription() . ", с шоколадом";
    }

    public function getCost(): float
    {
        return $this->decoratedCoffee->getCost() + 2.5;
    }
}

class CaramelDecorator extends CoffeeDecorator
{
    public function getDescription(): string
    {
        return $this->decoratedCoffee->getDescription() . ", с карамелью";
    }

    public function getCost(): float
    {
        return $this->decoratedCoffee->getCost() + 3.0;
    }
} 