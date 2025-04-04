<?php

namespace Lab2\DesignPatterns\Behavioral;

/**
 * Strategy - Поведенческий паттерн проектирования, который определяет семейство схожих алгоритмов
 * и помещает каждый из них в собственный класс, после чего алгоритмы можно взаимозаменять прямо
 * во время исполнения программы.
 */

/**
 * Интерфейс Стратегии объявляет операции, общие для всех поддерживаемых версий
 * некоторого алгоритма.
 *
 * Контекст использует этот интерфейс для вызова алгоритма, определённого
 * Конкретными Стратегиями.
 */
interface PaymentStrategy
{
    public function pay(float $amount): string;
}

/**
 * Конкретные Стратегии реализуют алгоритм, следуя базовому интерфейсу Стратегии.
 * Этот интерфейс делает их взаимозаменяемыми в Контексте.
 */
class CreditCardStrategy implements PaymentStrategy
{
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var string
     */
    private $cardNumber;
    
    /**
     * @var string
     */
    private $cvv;
    
    /**
     * @var string
     */
    private $dateOfExpiry;
    
    public function __construct(string $name, string $cardNumber, string $cvv, string $dateOfExpiry)
    {
        $this->name = $name;
        $this->cardNumber = $cardNumber;
        $this->cvv = $cvv;
        $this->dateOfExpiry = $dateOfExpiry;
    }
    
    public function pay(float $amount): string
    {
        return "Оплата " . $amount . " рублей выполнена кредитной картой " . 
                substr($this->cardNumber, 0, 4) . "XXXXXXXX" . substr($this->cardNumber, -4);
    }
}

class PayPalStrategy implements PaymentStrategy
{
    /**
     * @var string
     */
    private $email;
    
    /**
     * @var string
     */
    private $password;
    
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
    
    public function pay(float $amount): string
    {
        return "Оплата " . $amount . " рублей выполнена через PayPal аккаунт " . $this->email;
    }
}

class BitcoinStrategy implements PaymentStrategy
{
    /**
     * @var string
     */
    private $address;
    
    public function __construct(string $address)
    {
        $this->address = $address;
    }
    
    public function pay(float $amount): string
    {
        return "Оплата " . $amount . " рублей выполнена биткоинами на адрес " . $this->address;
    }
}

/**
 * Контекст определяет интерфейс, представляющий интерес для клиентов.
 * Он хранит ссылку на объект Стратегии. Контекст не знает о конкретном
 * классе стратегии. Он должен работать со всеми стратегиями через
 * интерфейс Стратегии.
 */
class ShoppingCart
{
    /**
     * @var array
     */
    private $items = [];
    
    /**
     * @var PaymentStrategy
     */
    private $paymentStrategy;
    
    public function addItem(string $itemName, float $price, int $quantity): void
    {
        $this->items[] = [
            'name' => $itemName,
            'price' => $price,
            'quantity' => $quantity
        ];
    }
    
    public function calculateTotal(): float
    {
        $sum = 0;
        
        foreach ($this->items as $item) {
            $sum += $item['price'] * $item['quantity'];
        }
        
        return $sum;
    }
    
    public function setPaymentStrategy(PaymentStrategy $paymentStrategy): void
    {
        $this->paymentStrategy = $paymentStrategy;
    }
    
    public function checkout(): string
    {
        $amount = $this->calculateTotal();
        return $this->paymentStrategy->pay($amount);
    }
} 