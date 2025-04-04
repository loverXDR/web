<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Show the absolute path for debugging
echo "Current directory: " . __DIR__ . "<br>";
echo "Full path to Singleton.php: " . __DIR__ . "/lab2/DesignPatterns/Creational/Singleton.php<br>";
echo "File exists: " . (file_exists(__DIR__ . "/lab2/DesignPatterns/Creational/Singleton.php") ? "Yes" : "No") . "<br>";

// Try to include the file directly
require_once __DIR__ . "/lab2/DesignPatterns/Creational/Singleton.php";

// Try to use the class
try {
    echo "<br>Trying to use the Singleton class:<br>";
    $instance = \Lab2\DesignPatterns\Creational\Singleton::getInstance();
    echo "Success! Got an instance of Singleton.<br>";
    var_dump($instance);
} catch (Throwable $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    echo "File: " . $e->getFile() . "<br>";
    echo "Line: " . $e->getLine() . "<br>";
}
?> 