<?php

class Settings 
{
    private static $instance;
    private $settings = [];

    // Private constructor to prevent direct instantiation
    private function __construct() {}

    // Private clone method to prevent cloning
    private function __clone() {}

    // Private wakeup method to prevent deserialization
    public function __wakeup() 
    {
        throw new Exception("Cannot unserialize singleton");
    }

    // Method to get the instance of the class
    public static function getInstance() 
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Set a setting value
    public function set($key, $value) 
    {
        $this->settings[$key] = $value;
    }

    // Get a setting value
    public function get($key) 
    {
        return isset($this->settings[$key]) ? $this->settings[$key] : null;
    }

    // Get all settings
    public function getAll() 
    {
        return $this->settings;
    }
} 