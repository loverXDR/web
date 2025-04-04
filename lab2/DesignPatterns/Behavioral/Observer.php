<?php

namespace Lab2\DesignPatterns\Behavioral;

/**
 * Observer - Поведенческий паттерн проектирования, который создаёт механизм подписки,
 * позволяющий одним объектам следить и реагировать на события, происходящие в других объектах.
 */

/**
 * Интерфейс Издателя объявляет набор методов для управления подписчиками.
 */
interface Subject
{
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(): void;
}

/**
 * Интерфейс Наблюдателя объявляет метод уведомления, который издатели используют
 * для оповещения своих подписчиков.
 */
interface Observer
{
    public function update(Subject $subject): void;
}

/**
 * Конкретный Издатель содержит состояние и некоторую бизнес-логику, которая
 * может интересовать других.
 */
class WeatherStation implements Subject
{
    /**
     * @var float
     */
    private $temperature;
    
    /**
     * @var float
     */
    private $humidity;
    
    /**
     * @var float
     */
    private $pressure;
    
    /**
     * @var Observer[]
     */
    private $observers = [];
    
    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
        echo "Добавлен новый наблюдатель<br>";
    }
    
    public function detach(Observer $observer): void
    {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);
                echo "Удален наблюдатель<br>";
                break;
            }
        }
    }
    
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
    
    /**
     * Метод, содержащий бизнес-логику, которая запускает обновление.
     */
    public function setMeasurements(float $temperature, float $humidity, float $pressure): void
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        
        $this->notify();
    }
    
    /**
     * Геттеры для получения доступа к состоянию Издателя.
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }
    
    public function getHumidity(): float
    {
        return $this->humidity;
    }
    
    public function getPressure(): float
    {
        return $this->pressure;
    }
}

/**
 * Конкретные Наблюдатели реагируют на обновления, выпущенные Издателем, к которому они
 * прикреплены.
 */
class CurrentConditionsDisplay implements Observer
{
    /**
     * @var float
     */
    private $temperature;
    
    /**
     * @var float
     */
    private $humidity;
    
    /**
     * @var WeatherStation
     */
    private $weatherStation;
    
    public function update(Subject $subject): void
    {
        if ($subject instanceof WeatherStation) {
            $this->weatherStation = $subject;
            $this->temperature = $subject->getTemperature();
            $this->humidity = $subject->getHumidity();
            $this->display();
        }
    }
    
    public function display(): string
    {
        return "Текущие условия: " . $this->temperature . "C градусов и " . $this->humidity . "% влажности";
    }
}

class StatisticsDisplay implements Observer
{
    /**
     * @var float
     */
    private $maxTemp = 0.0;
    
    /**
     * @var float
     */
    private $minTemp = 200.0;
    
    /**
     * @var float
     */
    private $tempSum = 0.0;
    
    /**
     * @var int
     */
    private $numReadings = 0;
    
    /**
     * @var WeatherStation
     */
    private $weatherStation;
    
    public function update(Subject $subject): void
    {
        if ($subject instanceof WeatherStation) {
            $this->weatherStation = $subject;
            $temp = $subject->getTemperature();
            
            $this->tempSum += $temp;
            $this->numReadings++;
            
            if ($temp > $this->maxTemp) {
                $this->maxTemp = $temp;
            }
            
            if ($temp < $this->minTemp) {
                $this->minTemp = $temp;
            }
            
            $this->display();
        }
    }
    
    public function display(): string
    {
        $avgTemp = $this->tempSum / $this->numReadings;
        return "Статистика: Средняя/Максимальная/Минимальная температура = " . 
                round($avgTemp, 1) . "/" . $this->maxTemp . "/" . $this->minTemp;
    }
} 